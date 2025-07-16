<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $result = 40 ;
    if (isset($result)){
       if($result >= 50)  {echo "ناجح " ; }
       else   {echo "راسب" ;}
    }
    else {
        echo " ادخل الدرجة لو سمحت " ;
    }
    
    ?>
</body>
</html>