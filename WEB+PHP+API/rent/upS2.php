<?php
   require '../index.php';
    
    $username = $_GET['username'];
    $status= "ผ่านการตรวจสอบ" . $str;
    $sql = "UPDATE userimg1 SET status2='$status' WHERE username='$username'"; 
    
    $result = mysqli_query($con, $sql);
    if($result){
                                echo "<script>";
                                echo "alert(\"สำเร็จ\");"; 
                                echo "window.history.back()";
                                echo "</script>";
    } else {
        
        echo 'ผิดพลาด' . mysqli_error($con);
        
    }
    mysqli_close($con);
    
   
?>