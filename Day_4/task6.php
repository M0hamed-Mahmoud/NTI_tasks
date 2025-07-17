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
        $array = ["HTML","CSS","JS","PHP"] ; 
        array_push($array,"MY SQL") ;
        array_unshift($array,"GIT");
        array_shift($array);
    ?>
    <div class="container">
        <div class="row mt-5">
            <h1 class=" text-info mt-5"> Available Courses</h1>
            <ul class="list-group">
                <?php foreach($array as $course): ?>
                <li class="list-group-item"> <?= $course ?> </li>
                <?php endforeach ; ?>
            </u>


        </div>

    </div>
</ul>
        




    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>