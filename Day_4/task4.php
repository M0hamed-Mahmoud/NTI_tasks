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
    $array = [
    [ "name" => "laptop" , "price" => "15000" , "quantity" => "3"] , 
   [ "name" => "phone" , "price" => "7000" , "quantity" => "2"] , 
    [ "name" => "tablet" , "price" => "9000" , "quantity" => "1"]  
    ]
    ?>
    <div class="container">
        <div class="row mt-5">
           
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Price (EGP)</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    for ($i = 0; $i < count($array); $i++) {
                        echo "<tr>";
                        foreach ($array[$i] as $value) {
                            if($array[$i]["price"] > 7000){

                                echo "<td>$value</td>";
                            }
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            
            </table>
        </div>
    </div>  
    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>