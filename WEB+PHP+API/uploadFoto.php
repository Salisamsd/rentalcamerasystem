<?php
		
    $username = $_POST['username'];
    $text= "รอตรวจสอบ" . $str;
    $target_dir = "userUpload/";
	$image =basename($_FILES["photo"]["name"]);
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$check = getimagesize($_FILES["photo"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
			
			$con = mysqli_connect('localhost', 'manocame', 'Pern1234') or die('nooo'. mysqli_connect_error());
            mysqli_set_charset($con, "utf8");
            
            mysqli_select_db($con,'main');
           $sql = "UPDATE userimg1 SET img1 = '$image', status = '$text'  WHERE username = '$username' ";
           //$sql = "INSERT INTO userimg1 (username,img1,status)VALUES('$username','$image','$text')";
		$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
		mysqli_close($con);
			echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
?>
