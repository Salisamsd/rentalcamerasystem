<?php
    require 'index.php';
   
    $item_name = $_POST ['item_name'];
    $ft_name = $_POST ['ft_name'];
    
    
    $q =" INSERT INTO freeshow(item_name,ft_name) VALUES ('$item_name','$ft_name')";
    $result = mysqli_query($con,$q);
    if($result) {
        echo "เพิ่มข้อมูลเรียบร้อย";}
else{
    echo "เกิดข้อผิดพลาด".mysqli_error($con);
    
}
mysqli_close($con);