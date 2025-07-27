<?php
session_start();
$error = "";

if (isset($_SESSION['logstate'])) {
    if ($_SESSION['logstate'] === 1) {
        header("Location: control.php?user=" . urlencode($_SESSION['email']));
        exit;
    } elseif ($_SESSION['logstate'] === -1) {
        $error = "⚠️ Wrong password.";
    } elseif ($_SESSION['logstate'] === -2) {
        $error = "⚠️ Email not found.";
    }
    unset($_SESSION['logstate']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
<div class="container py-5">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-6 bg-dark p-4 rounded shadow-lg">

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST" action="logtest.php">
                <div class="mb-3">
                    <label class="form-label text-light">Email address</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-light">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <input type="hidden" name="action" value="login">
                <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
                <a href="signup.php" class="btn btn-success w-100">Register</a>
            </form>

        </div>
    </div>
</div>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>
