<?php
include '../init.php';
include '../auth/auth_check.php';

// Get the data from the form
$id = $_GET['id'];
$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];
$grade = !empty($_POST['grade']) ? "'".$_POST['grade']."'" : "NULL"; // Handle empty grade properly

// Build and execute the SQL UPDATE query
$sql = "UPDATE enrollments SET 
            student_id = '$student_id', 
            course_id = '$course_id', 
            grade = $grade 
        WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    // Redirect back to the list on success
    header("Location: " . BASE_URL . "enrollments/enrollments.php");
} else {
    // Optional: Show an error if the update fails
    echo "Error updating record: " . mysqli_error($conn);
}

exit();
?>