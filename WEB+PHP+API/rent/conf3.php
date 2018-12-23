<?php
   require '../index.php';
    
    $id = $_GET['id'];
    $status= "5" . $str;
    $sql = "UPDATE rentlist SET status='$status' WHERE id='$id'"; 
    
    $result = mysqli_query($con, $sql);
    if($result){
                              echo "<script>";
                        echo "alert(\"ยืนยันการยกเลิก!!\");"; 
                        echo "window.location.href = 'showrent4.php'";
                        echo "</script>";
    } else {
        
        echo 'ผิดพลาด' . mysqli_error($con);
        
    }
    mysqli_close($con);
    
   
?>