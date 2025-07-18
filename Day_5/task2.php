<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php 
    if($_SERVER['HTTP_HOST'] !== 'localhost'){
       echo" <div class='alert alert-warning mt-5' type='alert'>
            Access denied invalid host
        </div> " ; 
        header("Location: denied.php");
        exit ;
    }
    else {
        echo"
        <div class='alert alert-success mt-5' type='alert'>
            Access OK : GOOD host
        </div>" ; 
        echo $_SERVER['REQUEST_METHOD'];
        echo $_SERVER['REMOTE_ADDR'];
    
    }
    
    ?>
  

    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>