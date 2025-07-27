<?php
$conn = mysqli_connect("localhost","root","","training_system") ;
if (!$conn){
    die("connection failed :". mysqli_connect_error());
}
?>