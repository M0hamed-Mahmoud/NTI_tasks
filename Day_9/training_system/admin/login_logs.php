<?php
include '../init.php';
include '../auth/auth_check.php';

// Security: Only allow admins to access this page
if ($_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}

// JOIN query to get the user's name along with the log details
$logs_res = mysqli_query($conn, "
    SELECT logs.id, admin.name, admin.email, logs.login_time, logs.ip_address
    FROM login_logs AS logs
    JOIN admin ON logs.admin_id = admin.id
    ORDER BY logs.login_time DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successful Login Logs</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Successful Login Logs</h3>
        <a href="<?= BASE_URL ?>index.php" class="btn btn-secondary mb-3">Back to Dashboard</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Login Time</th>
                    <th>IP Address</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($logs_res)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['login_time']) ?></td>
                    <td><?= htmlspecialchars($row['ip_address']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>