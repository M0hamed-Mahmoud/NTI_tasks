<?php
header("Content-Type: application/json");
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['id'])) {
    $id = $data['id'];
    $sql = "DELETE FROM enrollments WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Enrollment deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Enrollment ID is required"]);
}
?>