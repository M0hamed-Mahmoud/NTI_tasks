<?php
header("Content-Type: application/json");
include "db.php";

$sql = "
    SELECT 
        enrollments.id,
        enrollments.enrollment_date,
        enrollments.student_id,
        students.name AS student_name,
        enrollments.course_id,
        courses.title AS course_title
    FROM enrollments
    JOIN students ON enrollments.student_id = students.id
    JOIN courses ON enrollments.course_id = courses.id
";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!is_numeric($id)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Invalid Enrollment ID"]);
        exit;
    }
    $sql .= " WHERE enrollments.id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $sql .= " ORDER BY enrollments.enrollment_date DESC";
    $result = mysqli_query($conn, $sql);
}

if ($result && mysqli_num_rows($result) == 0 && isset($id)) {
    http_response_code(404);
    echo json_encode(["status" => "error", "message" => "Enrollment not found"]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
?>