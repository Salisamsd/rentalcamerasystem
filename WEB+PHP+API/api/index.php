<?php

    $con = mysqli_connect('localhost', 'manocame', 'Pern1234') or die('nooo'. mysqli_connect_error());
    mysqli_set_charset($con, "utf8");
    //echo 'ติดต่อฐานช้อมูลได้';
    mysqli_select_db($con,'main');

//$sql = "select * from items ";
//$query= mysqli_query($con, $sql);

//$data = [];
//$row = mysqli_fetch_assoc($res)){
   // array_push($data, $row);


 