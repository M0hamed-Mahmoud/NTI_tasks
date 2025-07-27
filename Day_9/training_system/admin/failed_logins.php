<?php
include '../init.php';
include '../auth/auth_check.php';

// Security: Only allow admins to access this page
if ($_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

$failed_logs_res = mysqli_query($conn, "SELECT * FROM failed_login_attempts ORDER BY attempt_time DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Failed Login Attempts</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Failed Login Attempts</h3>
        <a href="<?= BASE_URL ?>index.php" class="btn btn-secondary mb-3">Back to Dashboard</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Email Attempted</th>
                    <th>Time of Attempt</th>
                    <th>IP Address</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($failed_logs_res)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['email_attempt']) ?></td>
                    <td><?= htmlspecialchars($row['attempt_time']) ?></td>
                    <td><?= htmlspecialchars($row['ip_address']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>