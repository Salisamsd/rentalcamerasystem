<?php

    require 'index.php';
    
    $ft_id = $_GET['ft_id'];
    
    $q = "DELETE FROM freeitems WHERE ft_id='$ft_id'";
    
    $result = mysqli_query($con, $q);
    if($result){
       // echo 'ลบแล้ว' ;
        //echo "<hr>";
   //echo "<a href='List.php'>แสดงข้อมูล</a>";
    header("Location: freeitemslist.php");
    } else {
        
        echo 'ผิดพลาด' . mysqli_error($con);
        
    }
    mysqli_close($con);
