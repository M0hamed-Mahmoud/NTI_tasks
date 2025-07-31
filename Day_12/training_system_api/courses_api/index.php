<?php
// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include database and object files
include_once '../config/Database.php';
include_once '../models/Course.php';

// Instantiate database and course object
$database = new Database();
$db = $database->getConnection();
$course = new Course($db);

// Get the request method
$method = $_SERVER['REQUEST_METHOD'];

// Get posted data
$data = json_decode(file_get_contents("php://input"));

switch ($method) {
    case 'GET':
        if (!empty($_GET['id'])) {
            // Get a single course
            $course->id = $_GET['id'];
            $course->readOne();
            if ($course->title != null) {
                $course_arr = ["id" => $course->id, "title" => $course->title, "description" => $course->description, "hours" => $course->hours, "price" => $course->price];
                http_response_code(200);
                echo json_encode([$course_arr]);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Course not found."]);
            }
        } else {
            // Get all courses
            $stmt = $course->read();
            $num = $stmt->get_result()->num_rows;

            if ($num > 0) {
                $courses_arr = [];
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    extract($row);
                    $courses_arr[] = ["id" => $id, "title" => $title, "description" => $description, "hours" => $hours, "price" => $price];
                }
                http_response_code(200);
                echo json_encode($courses_arr);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "No courses found."]);
            }
        }
        break;

    case 'POST':
        if (!empty($data->title) && !empty($data->hours)) {
            $course->title = $data->title;
            $course->description = $data->description;
            $course->hours = $data->hours;
            $course->price = $data->price;

            if ($course->create()) {
                http_response_code(201); // 201 Created
                echo json_encode(["message" => "Course was created."]);
            } else {
                http_response_code(503); // 503 Service Unavailable
                echo json_encode(["message" => "Unable to create course."]);
            }
        } else {
            http_response_code(400); // 400 Bad Request
            echo json_encode(["message" => "Unable to create course. Data is incomplete."]);
        }
        break;

    case 'PUT':
        if (!empty($data->id) && !empty($data->title)) {
            $course->id = $data->id;
            $course->title = $data->title;
            $course->description = $data->description;
            $course->hours = $data->hours;
            $course->price = $data->price;

            if ($course->update()) {
                http_response_code(200);
                echo json_encode(["message" => "Course was updated."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "Unable to update course."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Unable to update course. Data is incomplete."]);
        }
        break;

    case 'DELETE':
        if (!empty($data->id)) {
            $course->id = $data->id;
            if ($course->delete()) {
                http_response_code(200);
                echo json_encode(["message" => "Course was deleted."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "Unable to delete course."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Unable to delete course. ID is missing."]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Method Not Allowed"]);
        break;
}
?>
