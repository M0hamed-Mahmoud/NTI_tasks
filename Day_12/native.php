<?php 
$conn = mysqli_connect("localhost","root","","test123");
$email = "example@gmail.com" ;
$sql = "SELECT * FROM students WHERE email = ? ";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt,"s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);  
while($row = mysqli_fetch_assoc($result)){
    echo $row['name'] . "<br>" ; 
}      
?>