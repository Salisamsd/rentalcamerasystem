<?php
   require '../index.php';
    
    $id = $_GET['id'];
    $status= "3" . $str;
    $sql = "UPDATE rentlist SET status='$status' WHERE id='$id'"; 
    
    $result = mysqli_query($con, $sql);
    if($result){
                              echo "<script>";
                        echo "alert(\"ยืนยันการรับเครื่อง !!\");"; 
                        echo "window.location.href = 'showrent3.php'";
                        echo "</script>";
    } else {
        
        echo 'ผิดพลาด' . mysqli_error($con);
        
    }
    mysqli_close($con);
    
   
?>