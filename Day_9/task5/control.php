<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test444";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_GET['user'] ?? '';
$stmt = mysqli_prepare($conn, "SELECT name, email FROM login_users WHERE email = ?");

mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "<div class='alert alert-danger m-5'>Access denied. Invalid user.</div>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-dark p-4 rounded shadow-lg">
            <div class="alert alert-success">✅ Welcome, <?= htmlspecialchars($user['name']) ?> (<?= htmlspecialchars($user['email']) ?>)</div>
            <div class="row g-2">
                <div class="col-4"><a href="logout.php" class="btn btn-primary w-100">Logout</a></div>
                <div class="col-4"><a href="addproduct.php?user=<?= urlencode($email) ?>" class="btn btn-primary w-100">Products</a></div>
                <div class="col-4"><a href="signup.php" class="btn btn-primary w-100">Create Account</a></div>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>
