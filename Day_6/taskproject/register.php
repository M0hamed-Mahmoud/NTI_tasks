<?php
$page_title = "Register";
include_once('partials/header.php');

$errors = [];
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $email = trim($_POST['email']);

    if (empty($username) || empty($password) || empty($email)) {
        $errors[] = "All fields are required.";
    }

    $users = get_all_users();
    if (isset($users[$username])) {
        $errors[] = "Username already exists.";
    }

    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $user_file = 'data/users.txt';
        // Format: username | email | hashed_password
        $user_data = "{$username} | {$email} | {$password_hash}\n";
        file_put_contents($user_file, $user_data, FILE_APPEND);
        $success_message = 'User registered. You can now <a href="login.php" class="alert-link">login</a>.';
    }
}
?>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm" style="width: 500px;">
        <div class="card-body p-5">
            <h3 class="card-title text-center mb-4">Register</h3>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) echo "<p class='mb-0'>$error</p>"; ?>
                </div>
            <?php endif; ?>
            <?php if ($success_message): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>
            <form action="register.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
                <div class="text-center">
                    <p class="mb-0">Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>