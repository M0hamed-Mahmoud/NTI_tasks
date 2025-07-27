<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];
$sql=" INSERT INTO students(  name ,email,phone,date_of_birth ) 
       VALUES ('$name','$email','$phone','$dob')";
mysqli_query($conn , $sql);
header("Location: students.php") ;
?>
