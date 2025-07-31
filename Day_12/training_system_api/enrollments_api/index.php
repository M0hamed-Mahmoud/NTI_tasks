<?php
// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include database and object files
include_once '../config/Database.php';
include_once '../models/Enrollment.php';

// Instantiate database and enrollment object
$database = new Database();
$db = $database->getConnection();
$enrollment = new Enrollment($db);

$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"));

switch ($method) {
    case 'GET':
        $stmt = $enrollment->read();
        $num = $stmt->get_result()->num_rows;
        if ($num > 0) {
            $enrollments_arr = [];
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                extract($row);
                $enrollments_arr[] = $row;
            }
            http_response_code(200);
            echo json_encode($enrollments_arr);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "No enrollments found."]);
        }
        break;

    case 'POST':
        if (!empty($data->student_id) && !empty($data->course_id)) {
            $enrollment->student_id = $data->student_id;
            $enrollment->course_id = $data->course_id;
            if ($enrollment->create()) {
                http_response_code(201);
                echo json_encode(["status" => "success", "message" => "Enrollment was created."]);
            } else {
                http_response_code(503);
                echo json_encode(["status" => "error", "message" => "Unable to create enrollment."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Data is incomplete."]);
        }
        break;

    case 'PUT':
        if (!empty($data->id) && !empty($data->student_id) && !empty($data->course_id)) {
            $enrollment->id = $data->id;
            $enrollment->student_id = $data->student_id;
            $enrollment->course_id = $data->course_id;
            if ($enrollment->update()) {
                http_response_code(200);
                echo json_encode(["status" => "success", "message" => "Enrollment was updated."]);
            } else {
                http_response_code(503);
                echo json_encode(["status" => "error", "message" => "Unable to update enrollment."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Data is incomplete."]);
        }
        break;

    case 'DELETE':
        if (!empty($data->id)) {
            $enrollment->id = $data->id;
            if ($enrollment->delete()) {
                http_response_code(200);
                echo json_encode(["status" => "success", "message" => "Enrollment was deleted."]);
            } else {
                http_response_code(503);
                echo json_encode(["status" => "error", "message" => "Unable to delete enrollment."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "ID is missing."]);
        }
        break;
}
?>