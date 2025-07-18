<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-success">
    <?php 
        $fullname = $_POST['fullname'] ?? ''; 
        $email = $_POST['email'] ?? ''; 
        $age = $_POST['age'] ?? ''; 
        $city = $_POST['city'] ?? '' ; 
        $name_arr = explode( ' ' , $fullname ) ; 
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center ">
             <div class="card shadow p-4" style="max-width: 24rem;">
                <h4 class="text-center fw-semibold mb-4">User Profile</h4>

            
                <div class="alert alert-success py-2 px-3 mb-3 text-center fw-semibold" role="alert">
                Welcome, <?= $name_arr[0] ?>!
                </div>
                <div class="card shadow p-4" style="max-width: 22rem;">
                <h4 class="text-center fw-semibold mb-4">User information </h4>
                <form >
                <div class="card " style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <b>Full name</b> <?= $fullname?></li>
                    <li class="list-group-item"><b>Email</b> <?= $email?> </li>
                    <li class="list-group-item"><b>Age</b> <?= $age?></li>
                    <li class="list-group-item"><b> city </b>  <?= $city ?></li>
                    </ul>
                </div>
                </form>

                <div class="text-center">
                <a href="task3.html" class="btn btn-primary mt-3">Back to Form</a>
            </div>
        </div>

    </div>
        




    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>