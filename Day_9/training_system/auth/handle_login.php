<?php
// session_start();
// include '../db/db.php';


// $email = mysqli_real_escape_string($conn, $_POST['email']);
// $password = $_POST['password'];

// $sql = "SELECT * FROM admin WHERE email = '$email'";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) == 1) {
//     $user = mysqli_fetch_assoc($result);

//     // Requirement: Verify hashed password
//     if (password_verify($password, $user['password'])) {
//         // Requirement: Login form + session
//         $_SESSION['user_id'] = $user['id'];
//         $_SESSION['user_name'] = $user['name'];
//         $_SESSION['user_role'] = $user['role']; // For user roles
//         header("Location: ../index.php"); // Redirect to main dashboard
//         exit();
//     }
// }

// // If login fails
// $_SESSION['error'] = "Invalid email or password.";
// header("Location: login.php");

// We need to include init.php to get access to the DB connection ($conn)
include '../init.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];
$ip_address = $_SERVER['REMOTE_ADDR']; // Get user's IP address

$sql = "SELECT * FROM admin WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        // --- SUCCESSFUL LOGIN ---
        // 1. Record the successful login
        $log_sql = "INSERT INTO login_logs (admin_id, ip_address) VALUES ('{$user['id']}', '$ip_address')";
        mysqli_query($conn, $log_sql);

        // 2. Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        header("Location: ../index.php");
        exit();
    }
}

// --- FAILED LOGIN ---
// If the script reaches this point, the login failed.
// 1. Record the failed attempt
$fail_log_sql = "INSERT INTO failed_login_attempts (email_attempt, ip_address) VALUES ('$email', '$ip_address')";
mysqli_query($conn, $fail_log_sql);

// 2. Set error and redirect
$_SESSION['error'] = "Invalid email or password.";
header("Location: login.php");
exit();
?>
