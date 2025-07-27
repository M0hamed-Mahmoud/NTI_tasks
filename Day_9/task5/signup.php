<?php
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test444";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password_input = $_POST['password'];

    // Check if user already exists
    $stmt = mysqli_prepare($conn, "SELECT id FROM login_users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $message = "⚠️ This email is already registered.";
    } else {
        // Insert new user
        $hashed_password = password_hash($password_input, PASSWORD_DEFAULT);
        $stmt_insert = mysqli_prepare($conn, "INSERT INTO login_users (name, email, password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt_insert, "sss", $name, $email, $hashed_password);
        mysqli_stmt_execute($stmt_insert);
        mysqli_stmt_close($stmt_insert);

        $_SESSION['logstate'] = 0; // success
        header("Location: login.php");
        exit;
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
<div class="container py-5">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-6 bg-dark p-4 rounded shadow-lg">
            <h2 class="text-light mb-4">Register</h2>

            <?php if (!empty($message)): ?>
                <div class="alert alert-warning"><?= $message ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label text-light">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-light">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-light">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Register</button>
                <div class="text-center text-secondary mt-2 small">Already have an account? <a href="login.php">Login</a></div>
            </form>
        </div>
    </div>
</div>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>


