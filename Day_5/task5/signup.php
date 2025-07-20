<?php
$users = [
    ["name" => "Admin", "email" => "admin@example.com", "password" => "123456", "image" => "uploads/admin.jpg"]
];

$success = false;
$newUser = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'], $_POST['password']) && isset($_FILES['image'])) {
    $uploadDir = 'uploads/';
    $imageName = basename($_FILES['image']['name']);
    $targetFile = $uploadDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $newUser = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "image" => $targetFile
        ];

        // Read file content
        $file = file_get_contents(__FILE__);

        // Match current users array
        $pattern = '/\$users\s*=\s*\[\s*((?:.|\n)*?)\];/';
        preg_match($pattern, $file, $matches);

        // Prepare new user string
        $newUserString = '    ["name" => "' . $newUser['name'] . '", "email" => "' . $newUser['email'] . '", "password" => "' . $newUser['password'] . '", "image" => "' . $newUser['image'] . '"]';

        // Append new user
        $updatedUsersBlock = trim($matches[1]) . ",\n" . $newUserString;

        // Replace and save file
        $newFile = preg_replace($pattern, '$users = [' . "\n" . $updatedUsersBlock . "\n];", $file);
        file_put_contents(__FILE__, $newFile);

        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container py-5">
        <?php if ($success): ?>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-6 bg-dark p-4">
                <div class="alert alert-success">✅ Account created successfully!</div>
                <div class="card">
                    <img src="<?= $newUser['image'] ?>" class="card-img-top" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $newUser['name'] ?></h5>
                        <p class="card-text"><strong>Email:</strong> <?= $newUser['email'] ?></p>
                        <p class="card-text"><strong>Password:</strong> <?= $newUser['password'] ?></p>
                        <a href="addproduct.php?user=<?= urlencode($newUser['email']) ?>" class="btn btn-success w-100">Add Products</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-6 bg-dark p-4">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form-control" required name="name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" required name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" required name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" required name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Sign up</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script> 
</body>
</html>
