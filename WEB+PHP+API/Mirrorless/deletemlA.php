<?php

    require '../index.php';
    
    $item_id = $_GET['item_id'];
    
    $q = "DELETE FROM items WHERE item_id='$item_id'";
    
    $result = mysqli_query($con, $q);
    if($result){
       // echo 'ลบแล้ว' ;
        //echo "<hr>";
   //echo "<a href='List.php'>แสดงข้อมูล</a>";
    header("Location:listML_A.php");
    } else {
        
        echo 'ผิดพลาด' . mysqli_error($con);
        
    }
    mysqli_close($con);