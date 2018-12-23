<?php
    $conn = mysqli_connect("localhost", "manocame", "Pern1234", "main");
    
    $id_location = $_POST["id_location"];
    $lattitude = $_POST["lattitude"];
    $longtitude = $_POST["longtitude"];
    //$password = $_POST["password"];
    $statement = mysqli_prepare($conn, "INSERT INTO location (id_location, lattitude, longtitude) VALUES ($id_location, $lattitude, $longtitude,)");
    mysqli_stmt_bind_param($statement, "siss", $id_location, $lattitude, $longtitude);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>