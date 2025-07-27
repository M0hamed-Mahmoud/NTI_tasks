<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';

$id = $_GET['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$sql = "UPDATE students SET name='$name', email='$email', phone='$phone', date_of_birth='$dob' WHERE id=$id";
mysqli_query($conn, $sql);
header("Location: students.php");
?>