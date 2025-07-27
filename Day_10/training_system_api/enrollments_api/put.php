<?php
header("Content-Type: application/json");
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && is_numeric($data['id'])) {
    $id = $data['id'];
    
    // Also delete enrollments for this student
    mysqli_query($conn, "DELETE FROM enrollments WHERE student_id=$id");

    $sql = "DELETE FROM students WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Student and their enrollments deleted"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Valid Student ID is required"]);
}
?>```

**File: `students_api/index.php`** (Updated)

```php
<?php
// ... (existing code) ...
switch ($method) {
  // ... (GET, POST, PUT cases) ...
  case 'DELETE':
    include 'delete.php';
    break;
  default:
  // ... (existing code) ...
}
?>