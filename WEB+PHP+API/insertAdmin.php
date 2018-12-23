<?php
   // require'index.php';
    $User_num =$_POST['User_num'];
    $Username =$_POST['Username'];
    $Password =$_POST['Password'];
    $Name =$_POST['Name'];
    $Lastname =$_POST['Lastname'];
    $Tel =$_POST['Tel'];
    $A_Address =$_POST['A_Address'];
    $Email =$_POST['Email'];
    $Status =$_POST['Status'];
       $random_digit=rand(0000,9999);
    if($_POST['upload']){
        $image_name="-".$imgname."-".$random_digit.date('m-d-Y_H:i:s')."-".$_FILES['img1']['name'];
        $image_type=$_FILES['img1']['type'];
        $image_size=$_FILES['img1']['size'];
        $image_tmp_name=$_FILES['img1']['tmp_name'];
            
            if($image_name==''){
                 echo "<script>";
                 echo "alert(\" กรุณาใส่รูป\");";
                 echo "</script>";
            
    }
            else {       
                move_uploaded_file ($image_tmp_name,"upload/$image_name");
            echo 'uploaded';
     $con = mysqli_connect('localhost', 'manocame', 'Pern1234') or die('nooo'. mysqli_connect_error());
            mysqli_set_charset($con, "utf8");
            //echo 'ติดต่อฐานช้อมูลได้';
            mysqli_select_db($con,'main');
    $q =" INSERT INTO member(User_num,Username,Password,Name,Lastname,Tel,A_Address,Email,image,Status) VALUES ('$User_num','$Username','$Password','$Name','$Lastname','$Tel','$A_Address','$Email','$image_name','$Status')";
    $result = mysqli_query($con,$q);
    if($result) {
                        echo "<script>";
                        echo "alert(\" แก้ไขข้อมูลสำเร็จ\");"; 
                        echo "window.location.href = 'newEmp.php'";
                        echo "</script>";}
else{
    echo "เกิดข้อผิดพลาด".mysqli_error($con);
    
}
    mysqli_close($con);}}
?>