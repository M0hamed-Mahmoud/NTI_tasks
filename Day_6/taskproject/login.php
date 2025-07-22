<?php
$page_title = "Login";
include_once('partials/header.php');

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    $users = get_all_users();
    
    // Check if user exists and password is correct
    if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
        // SUCCESS
        $_SESSION['user'] = $users[$username];
        log_login_attempt($username, 'SUCCESS');
        header("Location: dashboard.php");
        exit();
    } else {
        // FAIL
        $error = 'Login failed';
        log_login_attempt($username, 'FAIL');
    }
}
?>
<body class="bg-dark">
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card" style="width: 400px;" data-bs-theme="dark">
        <div class="card-body p-5">
            <h3 class="card-title text-center mb-4">Login</h3>
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                 <div class="text-center">
                    <p class="mb-0">Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>