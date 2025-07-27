<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';


$title = $_POST['title'];
$description = $_POST['description'];
$hours = $_POST['hours'];
$price = $_POST['price'];

$sql = "INSERT INTO courses (title, description, hours, price) 
        VALUES ('$title', '$description', '$hours', '$price')";
mysqli_query($conn, $sql);

header("Location: courses.php");

