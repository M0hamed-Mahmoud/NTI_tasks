<?php
// Go up one directory to find the init file.
include '../init.php';

// Go up one directory to find the auth check file.
include '../auth/auth_check.php';

$id = $_GET["id"];
$s = mysqli_fetch_assoc(mysqli_query($conn," SELECT * FROM students WHERE id = $id"));
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
    <?php include("../navbar.php"); ?>
    <div class="container mt-4">
        <h3 class="mb-3">Edit Student</h3>
        <form method="POST" action="update_student.php?id=<?=$id?>" class="card p-4 shadow-sm">
            <input name = "name" value="<?= $s['name'] ?>" class="form-control mb-2 " required>
            <input name = "email" value="<?=$s['email'] ?>" class="form-control mb-2 " required>
            <input name = "phone" value="<?=$s['phone'] ?>" class="form-control mb-2 " required>
            <input name = "dob" type="date" value="<?=$s['date_of_birth'] ?>" class="form-control mb-2 " required>
            <button class="btn btn-primary"> Updates</button>

        </form>

    </div>
    
</body>
</html>