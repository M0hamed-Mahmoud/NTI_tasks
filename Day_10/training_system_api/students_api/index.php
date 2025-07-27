<?php
header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    include 'get.php';
    break;
  case 'POST':
    include 'post.php';
    break;
  case 'PUT':
    include 'put.php';
    break;
  default:
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>