<?php
// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include database and object files
include_once '../config/Database.php';
include_once '../models/Student.php';

// Instantiate database and student object
$database = new Database();
$db = $database->getConnection();
$student = new Student($db);

$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"));

switch ($method) {
    case 'GET':
        if (!empty($_GET['id'])) {
            $student->id = $_GET['id'];
            $student->readOne();
            if ($student->name != null) {
                $student_arr = ["id" => $student->id, "name" => $student->name, "email" => $student->email, "phone" => $student->phone];
                echo json_encode([$student_arr]);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Student not found."]);
            }
        } else {
            $stmt = $student->read();
            $num = $stmt->get_result()->num_rows;
            if ($num > 0) {
                $students_arr = [];
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    extract($row);
                    $students_arr[] = ["id" => $id, "name" => $name, "email" => $email, "phone" => $phone];
                }
                http_response_code(200);
                echo json_encode($students_arr);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "No students found."]);
            }
        }
        break;

    case 'POST':
        if (!empty($data->name) && !empty($data->email)) {
            $student->name = $data->name;
            $student->email = $data->email;
            $student->phone = $data->phone;
            if ($student->create()) {
                http_response_code(201);
                echo json_encode(["status" => "success", "message" => "Student was created."]);
            } else {
                http_response_code(503);
                echo json_encode(["status" => "error", "message" => "Unable to create student."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Data is incomplete."]);
        }
        break;

    case 'PUT':
        if (!empty($data->id) && !empty($data->name)) {
            $student->id = $data->id;
            $student->name = $data->name;
            $student->email = $data->email;
            $student->phone = $data->phone;
            if ($student->update()) {
                http_response_code(200);
                echo json_encode(["status" => "success", "message" => "Student was updated."]);
            } else {
                http_response_code(503);
                echo json_encode(["status" => "error", "message" => "Unable to update student."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Data is incomplete."]);
        }
        break;

    case 'DELETE':
        if (!empty($data->id)) {
            $student->id = $data->id;
            if ($student->delete()) {
                http_response_code(200);
                echo json_encode(["status" => "success", "message" => "Student and their enrollments were deleted."]);
            } else {
                http_response_code(503);
                echo json_encode(["status" => "error", "message" => "Unable to delete student."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "ID is missing."]);
        }
        break;
}
?>