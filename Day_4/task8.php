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
    $arr = [ "mona" => 3000 , "Tarek" => 5500 , "Ali" => 6000 , "Ahmed" => 7000] ; 
    $passed = array_filter($arr, function($salary) {return $salary >= 5000;});
    ?>
     <div class="container mt-4">
        <h4 class="text-info">High salary employee </h4>
        <ul class="list-group">
            <?php foreach ($passed as $person => $salary): ?>
            <li class="list-group-item d-flex justify-content-between">
            <strong><?= $person ?></strong>
            <span class="badge bg-dark"><?= $salary ?> EGP</span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div

        




    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>