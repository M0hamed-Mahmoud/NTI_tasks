<?php
session_start();
include '../db/db.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

// Requirement: Password Hashing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$check_sql = "SELECT * FROM admin WHERE email = '$email'";
$res = mysqli_query($conn, $check_sql);
if(mysqli_num_rows($res) > 0) {
    $_SESSION['error'] = "An account with this email already exists.";
    header("Location: register.php");
    exit();
}

$sql = "INSERT INTO admin (name, email, password, role) VALUES ('$name', '$email', '$hashed_password', 'user')";

if (mysqli_query($conn, $sql)) {
    header("Location: login.php");
} else {
    $_SESSION['error'] = "Error: " . mysqli_error($conn);
    header("Location: register.php");
}
?>