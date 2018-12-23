<?php
 require'../index.php';
  $id =$_GET['id'];
  $rentFormat=$_POST['rentFormat'];
  //$Status =$_POST['Status'];
   $q="UPDATE rentlist SET rentFormat='$rentFormat' WHERE id='$id'";
   $result = mysqli_query($con, $q);
   if($result){
                        echo "<script>";
                        echo "alert(\" แก้ไขข้อมูลสำเร็จ\");"; 
                        echo "window.location.href = 'showrent.php'";
                        echo "</script>";
   }else{
       echo "เกิดข้อผิดพลาด".mysqli_error($con);
      
   }

   mysqli_close($con);
?>