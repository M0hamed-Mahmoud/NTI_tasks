<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Add New Course</h3>
        <form method="POST" action="insert_course.php" class="card p-4 shadow-sm">
            <input name="title" placeholder="Title" class="form-control mb-2" required>
            <textarea name="description" placeholder="Description" class="form-control mb-2" required></textarea>
            <input name="hours" type="number" step="0.01" placeholder="Hours" class="form-control mb-2" required>
            <input name="price" type="number" step="0.01" placeholder="Price" class="form-control mb-2" required>
            <button class="btn btn-success">Add Course</button>
        </form>
    </div>
</body>
</html>
