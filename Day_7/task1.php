<?php 
session_start();
$_SESSION['visits'] = ($_SESSION['visits'] ?? 0)+1 ;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
    <p class="m-3">page visits : <span class = "badge bg-primary"> <?= $_SESSION['visits']?></span></p>

     <script src="js/bootstrap.bundle.min.js"></script>
    
</body>
</html>