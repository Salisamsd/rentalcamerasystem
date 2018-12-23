<?php
    require 'index.php';
    $id =$_POST['id'];
	
    $item_name =$_POST['item_name'];
    $ft_name =$_POST['ft_name'];
   
    
    $q="UPDATE freeshow SET item_name='$item_name',ft_name='$ft_name' WHERE id='$id'"; 
    $result = mysqli_query($con, $q);
   if($result){
   echo "แก้ไขข้อมูลเรียบร้อย";
   echo "<hr>";
   echo "<a href='freeitemslist.php'>แสดงข้อมูล</a>";
   }else{
       echo "เกิดข้อผิดพลาด".mysqli_error($con);
      
   }
   mysqli_close($con);
    
