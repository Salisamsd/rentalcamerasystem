<?php
 require'index.php';
  $UserID =$_POST['UserID'];
  $Username =$_POST['Username'];
  $Password=$_POST['Password'];
  $Name =$_POST['Name'];
  $Lastname =$_POST['Lastname'];
  $Tel =$_POST['Tel'];
  $A_Address =$_POST['A_Address'];
  $Email =$_POST['Email'];
  $Status=$_POST['Status'];
  //$Status =$_POST['Status'];
   $q="UPDATE member SET Username='$Username',Name='$Name',Password='$Password',Lastname='$Lastname',A_Address='$A_Address',Tel='$Tel',Email='$Email',Status='$Status' WHERE UserID='$UserID'";
   $result = mysqli_query($con, $q);
   if($result){
                        echo "<script>";
                        echo "alert(\" แก้ไขข้อมูลสำเร็จ\");"; 
                        echo "window.location.href = 'newEmp.php'";
                        echo "</script>";
   }else{
       echo "เกิดข้อผิดพลาด".mysqli_error($con);
      
   }

   mysqli_close($con);
?>