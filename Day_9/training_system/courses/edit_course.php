<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';

$id = $_GET['id'];
$c = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM courses WHERE id = $id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Edit Course</h3>
        <form method="POST" action="update_course.php?id=<?=$id?>" class="card p-4 shadow-sm">
            <input name="title" value="<?= $c['title'] ?>" class="form-control mb-2" required>
            <textarea name="description" class="form-control mb-2" required><?= $c['description'] ?></textarea>
            <input name="hours" type="number" step="0.01" value="<?= $c['hours'] ?>" class="form-control mb-2" required>
            <input name="price" type="number" step="0.01" value="<?= $c['price'] ?>" class="form-control mb-2" required>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
