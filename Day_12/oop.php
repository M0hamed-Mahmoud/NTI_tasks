<?php 
$conn = new mysqli("localhost","root" , "" ,"test123");
$email = "example@gmail.com" ; 
$sql = "SELECT * FROM students WHERE email = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
    echo $row['name'] . "<br>" ; 
}



?>