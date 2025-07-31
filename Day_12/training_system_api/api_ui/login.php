<?php
// Add full error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

// --- CORRECTED PATH ---
include __DIR__ . '/../db.php';

// Check if the connection was successful. If not, db.php has a problem.
if (!isset($conn) || $conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database connection failed. Check your db.php file."]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (!$email || !$password) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Missing email or password"]);
    exit;
}

// Using 'password' column as per your database structure
$stmt = mysqli_prepare($conn, "SELECT id, name, password FROM admin WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Checking against $row['password']
    if (password_verify($password, $row['password'])) {
        $token = hash('sha256', $email . 'secret');
        
        // Inserting admin_id into login_logs table as per your structure
        mysqli_query($conn, "INSERT INTO login_logs (admin_id, ip_address) VALUES ('{$row['id']}', '{$_SERVER['REMOTE_ADDR']}')");

        echo json_encode([
            "status" => "success",
            "token" => $token,
            "name" => $row['name'],
            "user_id" => $row['id']
        ]);
    } else {
        http_response_code(401);
        echo json_encode(["status" => "error", "message" => "Wrong password"]);
    }
} else {
    http_response_code(404);
    echo json_encode(["status" => "error", "message" => "User not found"]);
}
?>