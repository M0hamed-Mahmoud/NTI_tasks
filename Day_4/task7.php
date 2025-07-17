<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <?php
    $arr = ["lab" => 15000 , "computer" => 30000 , "mobile" => 12000 , "screen" => 22000 , "keyboard" => 1000]; 
     asort($arr) ; 
    ?>
    <div class="container mt-4">
        <h4 class="text-danger">product prices</h4>
        <ul class="list-group">
            <?php foreach ($arr as $device => $price): ?>
            <li class="list-group-item d-flex justify-content-between">
                <span><?=($device) ?></span>
                <span class="badge bg-dark rounded-pill  "><?= $price?> EGP </span>
           
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>