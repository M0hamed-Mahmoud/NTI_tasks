<?php
// Use a relative path to include the init file.
include 'init.php';

// Include the session check.
include 'auth/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">

        <h3 class="mb-3">Dashboard Overview</h3>

        <!-- =============================================================== -->
        <!-- REQUIREMENT: DIFFERENT DASHBOARD UI FOR ADMIN                   -->
        <!-- This block will only be visible to users with the 'admin' role. -->
        <!-- =============================================================== -->
        <?php if ($_SESSION['user_role'] == 'admin'): ?>
            <div class="card shadow-sm mb-4">
                <div class="card-header fw-bold">
                    Admin Controls
                </div>
                <div class="card-body">
                    <p>Welcome, Admin! Here are your administrative tools.</p>
                    <!-- UPDATE THESE LINKS -->
                    <a href="<?= BASE_URL ?>admin/admin_panel.php" class="btn btn-dark">Go to Admin Panel</a>
                    <a href="<?= BASE_URL ?>admin/login_logs.php" class="btn btn-info">View Login Logs</a>
                    <a href="<?= BASE_URL ?>admin/failed_logins.php" class="btn btn-danger">View Failed Login Attempts</a>
                </div>
            </div>
        <?php endif; ?>

        <!-- This part is visible to everyone -->
        <div class="row d-flex justify-content-center">
            <!-- Student Card -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Students</h5>
                        <?php
                        $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM students"));
                        echo "<p class='card-text'>Total Students: <strong>{$count['total']}</strong></p>";
                        ?>
                        <a href="<?= BASE_URL ?>students/students.php" class="btn btn-primary">View Students</a>
                    </div>
                </div>
            </div>
            <!-- Other cards remain the same... -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Courses</h5>
                        <?php
                        $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM courses"));
                        echo "<p class='card-text'>Total Courses: <strong>{$count['total']}</strong></p>";
                        ?>
                        <a href="<?= BASE_URL ?>courses/courses.php" class="btn btn-success">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Enrollments</h5>
                        <?php
                        $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM enrollments"));
                        echo "<p class='card-text'>Total Enrollments: <strong>{$count['total']}</strong></p>";
                        ?>
                        <a href="<?= BASE_URL ?>enrollments/enrollments.php" class="btn btn-warning">View
                            Enrollments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>