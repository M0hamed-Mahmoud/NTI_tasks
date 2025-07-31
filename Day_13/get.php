<?php
header("Content-Type: application/json");
include("db.php");

$courses = [];

if (isset($_GET["id"]) && $_GET["id"] !== "") {
    $id = (int) $_GET["id"];                // cast to int
    $sql = "SELECT * FROM courses WHERE id = $id";
} else {
    $sql = "SELECT * FROM courses";
}

$result = mysqli_query($conn, $sql);
if ($result === false) {
    http_response_code(500);
    echo json_encode(["error" => mysqli_error($conn)]);
    exit;
}

while ($row = mysqli_fetch_assoc($result)) {
    $courses[] = $row;
}

echo json_encode($courses);
