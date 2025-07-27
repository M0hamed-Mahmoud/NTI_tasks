<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM students WHERE id = $id "); 
header("Location: students.php");
?>