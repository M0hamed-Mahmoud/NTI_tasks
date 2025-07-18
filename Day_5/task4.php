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
     if($_SERVER ['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])){
        $name = $_FILES['image']['name'];
        $ext = (explode('.' , $name)[count(explode('.',$name))-1]) ; 
        $typ = (explode('/', $_FILES['image']["type"])[0]);
        $allowed = ["png","jpg" ,];
        $tmp = $_FILES['image']['tmp_name'];
        if(in_array($ext,$allowed)){
            if($typ === "image"){
                move_uploaded_file($tmp,"img/$name");
                echo " <img src= 'img/$name' class=' img-thumbnail mt-3 ' width='200'>" ;
            }
            
            else{
             echo " <div class = 'alert alert-primary' role='alert'> 
                    the type not allowed </div> "   ;
            }
        }
        else {

               echo " <div class = 'alert alert-primary' role='alert'> 
                    the extention not allowed </div> " ;  


        }


     }
?>
    <form method="post" enctype ="multipart/form-data" class="p-3">
        <label class="form-label " for="image"> choose photo </label>
        <input type="file" name="image" class="form-control mb-2" required id="image">
        <button type="submit" class="btn btn-primary"> UPLOAD</button>
    </form>
     <script src="js/bootstrap.bundle.min.js"></script>
    
</body>
</html>