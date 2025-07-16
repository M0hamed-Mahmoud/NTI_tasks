<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        for( $x = 0 ; $x<=20 ; $x =$x +5 ) {
            echo("$x");
        }
        echo"<br>" ; 
        for( $x = 0 ; $x<=20 ; $x++ ){
            if($x % 5==0){ echo "$x" ; }
        }
    
    ?>
    
</body>
</html>