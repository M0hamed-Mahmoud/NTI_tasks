<?php
header("Content-Type: application/json");
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['id'])) {
    $id = $data['id'];
    $name = mysqli_real_escape_string($conn, $data['name']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $phone = mysqli_real_escape_string($conn, $data['phone']);

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Student updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "ID is required"]);
}
?>