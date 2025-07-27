<?php
header("Content-Type: application/json");
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && is_numeric($data['id'])) {
    $id = $data['id'];
    
    // Important: First, delete enrollments associated with this course to avoid foreign key errors
    $sql_enroll = "DELETE FROM enrollments WHERE course_id=$id";
    mysqli_query($conn, $sql_enroll);

    // Now, delete the course
    $sql_course = "DELETE FROM courses WHERE id=$id";
    if (mysqli_query($conn, $sql_course)) {
        echo json_encode(["status" => "success", "message" => "Course and related enrollments deleted"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting course: " . mysqli_error($conn)]);
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => "error" , "message" => "A valid numeric 'id' is required."]);
}
?>