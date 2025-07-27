<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: * ");
if($_SERVER["SERVER_NAME"] == "127.0.0.1"){
    $data = ["data" => [["message " => "wrong try to get data"]], "connection" => "false" , "message" => "wrong domain"] ;
    echo json_encode($data);

} else{
    $d = [
        "data" =>[
            [
                "name" => "john" , 
                "age" => 30 ,
                "city"=> "New York",
            ],[

                "name"=> "ahmed",
                "age"=> 29,
                "city"=> "Egypt",
            ]
            ], 
            "connection" => true ,
            "message" => "Data Retrived Successfully"
        ];
        echo json_encode($d);
}




?>