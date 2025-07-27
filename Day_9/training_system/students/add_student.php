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
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3"> Add New Students</h3>

        <form method="POST" action="insert_student.php" class="card p-4 shadow-sm">
            <input name="name" class="form-control mb-2" placeholder="Name" required>
            <input name="email" class="form-control mb-2" placeholder="Email" required>
            <input name="phone" class="form-control mb-2" placeholder="Phone" required>
            <input name="dob" type="date" class="form-control mb-2" required>
            <button class="btn btn-success">Add Student</button>
        </form>
        </form>
    </div>

</body>

</html>