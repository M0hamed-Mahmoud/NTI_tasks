<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM courses WHERE id = $id");
header("Location: courses.php");
