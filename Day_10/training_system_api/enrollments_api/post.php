<?php
header("Content-Type: application/json");
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['student_id']) && !empty($data['course_id'])) {
    $student_id = $data['student_id'];
    $course_id = $data['course_id'];

    $sql = "INSERT INTO enrollments (student_id, course_id) VALUES ($student_id, $course_id)";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Enrollment successful"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Student and Course are required"]);
}
?>