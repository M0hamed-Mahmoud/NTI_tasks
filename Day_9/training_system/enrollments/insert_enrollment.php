<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';


$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];
// Use null if grade is empty, otherwise use the posted value
$grade = !empty($_POST['grade']) ? $_POST['grade'] : 'NULL';

// enrollment_date will be set to current_timestamp() by default in the DB
$sql = "INSERT INTO enrollments (student_id, course_id, grade) VALUES ('$student_id', '$course_id', $grade)";

mysqli_query($conn, $sql);

header("Location: enrollments.php");
?>