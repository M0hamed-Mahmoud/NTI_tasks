<?php
$users = [
    ["name" => "Admin", "email" => "admin@example.com", "password" => "123456", "image" => "uploads/admin.jpg"]
    
];
$products = [
    ["name" => "Sample Product", "description" => "A sample product.", "image" => "uploads/sample.jpg"]
];
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['email'], $_GET['password'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];
    $validUser = false;

    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $validUser = true;
            break;
        }
    }

    if ($validUser) {
        header("Location: control.php?user=" . urlencode($email));
        exit;
    } else {
        $error = " ⚠️ wrong user or password";
    }
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
<body class="bg-dark ">
    
    <div class="container py-5">
        <div class= "row d-flex justify-content-center mt-5 ">
            <div class="col-md-6 bg-dark p-4 rounded shadow-lg">

                <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
               
                <form  method="get">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-light">Email address</label>
                        <input type="email" class="form-control" required name="email" >
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label text-light">Password</label>
                        <input type="password" class="form-control" name="password"required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="mt-3 text-center small  text-secondary">
                    admin@example.com / 123456 <br>
                    test@example.com / test123
                </div>
               
            </div>

        </div>


    </div>


    <script src="js/bootstrap.bundle.js"></script> 
</body>
</html>