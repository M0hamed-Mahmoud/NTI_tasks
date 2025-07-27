<?php
header("Content-Type: application/json");
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!is_numeric($id)) {
        http_response_code(400); // Bad Request
        echo json_encode(["status" => "error", "message" => "Invalid Student ID"]);
        exit;
    }
    $stmt = mysqli_prepare($conn, "SELECT * FROM students WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $result = mysqli_query($conn, "SELECT * FROM students ORDER BY name");
}

if (mysqli_num_rows($result) == 0 && isset($id)) {
    http_response_code(404); // Not Found
    echo json_encode(["status" => "error", "message" => "Student not found"]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
?>