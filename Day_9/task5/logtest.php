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

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $email = $_POST['email'];
    $passwordInput = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT password FROM login_users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 1) {
        mysqli_stmt_bind_result($stmt, $hashedPassword);
        mysqli_stmt_fetch($stmt);

        if (password_verify($passwordInput, $hashedPassword)) {
            $_SESSION['logstate'] = 1;
            $_SESSION['email'] = $email;
        } else {
            $_SESSION['logstate'] = -1;
        }
    } else {
        $_SESSION['logstate'] = -2;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: login.php");
    exit;
}
?>

