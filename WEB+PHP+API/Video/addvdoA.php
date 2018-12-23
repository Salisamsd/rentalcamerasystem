
<?php   
        $item_id = $_POST['item_id'];
        $item_model = $_POST['item_model'];
        $item_name = $_POST['item_name'];
        $item_description = $_POST['item_description'];
        $option_id = $_POST['option_id'];
        $item_price = $_POST['item_price'];
        $item_priceperday =$_POST['item_priceperday'];
        $deposit_1 = $_POST['deposit_1'];
        $deposit_2 =$_POST['deposit_2'];
        $type_id = $_POST['type_id'];
        $brand_id = $_POST['brand_id'];
        $status_id =$_POST['status_id'];
        $emp =$_POST['emp'];
        
        if(isset($_POST['upload'])){
        $image_name="img".$imgname."-".$random_digit.date('m-d-Y_H:i:s')."-".$_FILES['img1']['name'];
        $image_type=$_FILES['img1']['type'];
        $image_size=$_FILES['img1']['size'];
        $image_tmp_name=$_FILES['img1']['tmp_name'];
            
            if($image_name==''){
                 echo "<script>";
                 echo "alert(\" กรุณาใส่รูป\");";
                 echo "</script>";
            
    }
            else        
                move_uploaded_file ($image_tmp_name,"../itempic/$image_name");

      if(isset($_POST['upload'])){
        $image1_name= "img".$imgname."-".$random_digit."-".date('m-d-Y_H:i:s').$_FILES['img2']['name'];
        $image1_type=$_FILES['img2']['type'];
        $image1_size=$_FILES['img2']['size'];
        $image1_tmp_name=$_FILES['img2']['tmp_name'];
            
            if($image1_name==''){
                 echo "<script>";
                 echo "alert(\" กรุณาใส่รูป\");";
                 echo "</script>";
            
    }
            else        
                move_uploaded_file ($image1_tmp_name,"../itempic/$image1_name");
                        echo "<script>";
                        echo "alert(\" เพิ่มข้อมูลสำเร็จ\");"; 
                        echo "window.location.href = 'listvdo_A.php'";
                        echo "</script>";
            
            $con = mysqli_connect('localhost', 'manocame', 'Pern1234') or die('nooo'. mysqli_connect_error());
            mysqli_set_charset($con, "utf8");
            //echo 'ติดต่อฐานช้อมูลได้';
            mysqli_select_db($con,'main');
            $sql = "INSERT INTO items (item_name,brand_id,option_id,type_id,status_id,item_model,item_description,item_price,item_priceperday,deposit_1,deposit_2,img1,img2,emp) 
                                VALUES('$item_name','$brand_id','$option_id','$type_id','$status_id','$item_model','$item_description','$item_price','$item_priceperday','$deposit_1','$deposit_2','$image_name','$image1_name','$emp')";
		
		$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);}   }
?>
      
     