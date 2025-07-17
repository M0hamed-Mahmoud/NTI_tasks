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
    $arr=["Name" => "Mohamed" , "job Title" => "Front end Developer" , "Department" => "UI/UX" , "Salary" => 15000]; 
    ?>
    <div class="container">
        <div class="row mt-5">
            <ul class="list-group">
                <?php
                    foreach($arr as $key => $value):    
                ?>
                <li class="list-group-item"> 
                     <strong> <?= $key ?> </strong> : <?= $value ?>
                </li>
                 <?php endforeach ; ?>
            </ul>

        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>