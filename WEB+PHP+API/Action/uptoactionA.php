<?php
    $random_digit=rand(0000,9999);
    if(isset($_POST['update'])){
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
    
    $con = mysqli_connect('localhost', 'manocame', 'Pern1234') or die('nooo'. mysqli_connect_error());
            mysqli_set_charset($con, "utf8");
            mysqli_select_db($con,'main');
            $sql = "UPDATE items SET item_model='$item_model',item_name='$item_name',item_description='$item_description',option_id='$option_id',item_price='$item_price',item_priceperday='$item_priceperday',deposit_1='$deposit_1',deposit_2='$deposit_2',type_id='$type_id',brand_id='$brand_id',status_id='$status_id' WHERE item_id='$item_id'"; 
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
            
        if($_FILES['img1']['name']!="")
	{
            $image_name="img_".$imgname."-".$random_digit.date('m-d-Y_H:i:s')."-".$_FILES['img1']['name'];
            $image_type=$_FILES['img1']['type'];
            $image_size=$_FILES['img1']['size'];
            $image_tmp_name=$_FILES['img1']['tmp_name'];
            
		if(move_uploaded_file($_FILES["img1"]["tmp_name"],"../itempic/$image_name"))
		{

			
			@unlink("../itempic/".$_POST["old_image"]);

            $con = mysqli_connect('localhost', 'manocame', 'Pern1234') or die('nooo'. mysqli_connect_error());
            mysqli_set_charset($con, "utf8");
            //echo 'ติดต่อฐานช้อมูลได้';
            mysqli_select_db($con,'main');
            $sql = "UPDATE items SET  img1='$image_name' WHERE item_id='$item_id'"; 
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
               }
        }
        if($_FILES['img2']['name']!="")
	{
            $image_name1="img_".$imgname."-".$random_digit.date('m-d-Y_H:i:s')."-".$_FILES['img2']['name'];
            $image_type1=$_FILES['img2']['type'];
            $image_size1=$_FILES['img2']['size'];
            $image_tmp_name1=$_FILES['img2']['tmp_name'];
            
		if(move_uploaded_file($_FILES["img2"]["tmp_name"],"../itempic/$image_name1"))
		{
                    @unlink("../itempic/".$_POST["old_image1"]);
                    $con = mysqli_connect('localhost', 'manocame', 'Pern1234') or die('nooo'. mysqli_connect_error());
                    mysqli_set_charset($con, "utf8");
            //echo 'ติดต่อฐานช้อมูลได้';
                     mysqli_select_db($con,'main');
                        $sql = "UPDATE items SET  img2='$image_name1' WHERE item_id='$item_id'"; 
                    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
               }
            }
    }
    if($result){
                        echo "<script>";
                        echo "alert(\" แก้ไขข้อมูลสำเร็จ\");"; 
                        echo "window.location.href = 'listaction_A.php'";
                        echo "</script>";
   }
      
   
    mysqli_close($con);  
              
   
?>