<?php

$users = [
    ["name" => "Admin", "email" => "admin@example.com", "password" => "123456", "image" => "uploads/admin.jpg"]
];

$products = [
    ["name" => "Sample Product", "description" => "A sample product.", "image" => "uploads/sample.jpg"]
];

$email = $_GET['user'] ?? '';
$loggedInUser = null;

foreach ($users as $user) {
    if ($user['email'] === $email) {
        $loggedInUser = $user;
        break;
    }
}

if (!$loggedInUser) {
    echo "<div class='alert alert-danger m-5'>Access denied. Invalid user.</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container py-5">
        <div class= "row d-flex justify-content-center mt-5 ">
            <div class="col-md-6 bg-dark p-4 rounded shadow-lg">
                <div class="alert alert-success" role="alert">
                   ✅ Welcome , <?= htmlspecialchars($loggedInUser['name']) ?> (<?= htmlspecialchars($loggedInUser['email']) ?>)
                </div>
                <div class="row g-2">
                    <div class="col-4">
                        <a href="login.php" class="btn btn-primary w-100">Logout</a>
                    </div>
                    <div class="col-4">
                        <a href="addproduct.php?user=<?= urlencode($email) ?>" class="btn btn-primary w-100">Products</a>
                    </div>
                    <div class="col-4">
                        <a href="signup.php?user=<?= urlencode($email) ?>" class="btn btn-primary w-100">Create Account</a>
                    </div>
                </div>
           
               
            </div>

        </div>
  



    <script src="js/bootstrap.bundle.js"></script>    
</body>
</html>