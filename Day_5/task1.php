<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body calss=" bg-dark ">
    <div class="container mt-5  ">
        <div class="row">
            <table class="table table-striped ">
                <thead>
                    <tr>
                    <th scope="col">KEY</th>
                    <th scope="col">value</th>

                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>PHP_SELF</td>
                    <td><?php echo  $_SERVER['PHP_SELF']  ; ?></td>
                    </tr>
                    <tr>
                    <td>SERVER_NAME</td>
                    <td><?php echo  $_SERVER['SERVER_NAME']  ;?></td>
                    </tr>
                    <tr>
                    <td>HTTP_HOST</td>
                    <td><?php echo  $_SERVER['HTTP_HOST'] ;?></td>
                    </tr>
                    <tr>
                    <td>USER_AGENT</td>
                    <td><?php echo  $_SERVER['HTTP_USER_AGENT'] ; ?></td>
                    </tr>
                    <tr>
                    <td>REQUEST_METHOD</td>
                    <td><?php echo $_SERVER['REQUEST_METHOD']  ; ?></td>
                    </tr>
                 
                </tbody>
            </table>


        </div>

    </div>

        




    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>