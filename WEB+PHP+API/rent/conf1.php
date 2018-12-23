<?php
   require '../index.php';
    
    $id = $_GET['id'];
    $status_r= "2" . $str;
    $sql = "UPDATE rentlist SET status_r='$status_r',status='$status_r' WHERE id='$id'"; 
    
    $result = mysqli_query($con, $sql);
    if($result){
                              echo "<script>";
                        echo "alert(\"ยืนยันการตรวจสอบ สำเiร็จ !!\");"; 
                        echo "alert(\"เปลี่ยน สถานะเป็น รอรับเครื่อง \");"; 
                        echo "window.location.href = 'showrent.php'";
                        echo "</script>";
    } else {
        
        echo 'ผิดพลาด' . mysqli_error($con);
        
    }
    mysqli_close($con);
    
   
?>