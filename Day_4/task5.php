<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $tools=[ "VS Code" , "Git" , "Git-Hub" , "Figma" , "Postman"] ; 
        echo "Tools count :" . count($tools) .  "<br>" ; 
        if (in_array("Git-Hub", $tools)) {
            echo "Git-Hub is available" . "<br>";
        }
        print_r(array_values($tools));


    
    
    ?> 
    
</body>
</html>