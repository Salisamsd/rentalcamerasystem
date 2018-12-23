 <title>MANOCAMERA</title>
<?php

        session_start();
	$serverName = "localhost";
	$userName = "manocame";
	$userPassword = "Pern1234";
	$dbName = "main";
	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	//$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
        $UserID= $_GET['UserID'];
//$qus = "select *from member where UserID= '$UserID'";
//$resus = mysqli_query($con, $qus);
$rowus = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);


?>

 <title>MANOCAMERA</title>
<?php include 'lockpage.php';?>
<div id="wrapper">
    <?php include('menu.php');?>
    
    <div class="container-fluid" >
        <form action="updateAd.php" method="post" enctype="mulitpart/form-data" id="form1">
  <fieldset>
    <legend>แก้ไขข้อมูลส่วนตัว</legend>
    <div class="form-group">
     <label class="col-form-label" >Username</label>
        <input type="text" class="form-control" placeholder="Username" id="Username" name="Username"  value="<?php echo $rowus['Username']; ?>" >
     <label class="col-form-label" >ชื่อ</label>
        <input type="text" class="form-control" placeholder="ชื่อ" name="Name" type="text" id="Name"  value="<?php echo $rowus['Name']; ?>" >
     <label class="col-form-label" >นามสกุล</label>
        <input type="text" class="form-control" placeholder="นามสกุล" name="Lastname"  id="Lastname"  value="<?php echo $rowus['Lastname']; ?>"  >
     <label class="col-form-label" >เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" name="Tel"  id="Tel" size="20" value="<?php echo $rowus['Tel']; ?>"   >
        
      <label >ที่อยู่</label>
      <textarea class="form-control" id="exampleTextarea" rows="3" id="A_Address" name="A_Address"><?php echo $rowus['A_Address']; ?></textarea>
      <label>Email</label>
      <input type="email" class="form-control" name="Email" id="Email"  placeholder="Enter email" value="<?php echo $rowus['Email']; ?>" >
      
    </div>
   
      <label>รูปภาพ</label>
       <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
       <img src="../upload/<?php echo $rowus['image']; ?> " WIDTH='20%'><br>
      <!--<input name="file1" type="file" />
      
      <small id="fileHelp" class="form-text text-muted">กรุณาใส่ภาพที่ระบุตัวตนของคุณ</small>
    
   
    <input type="hidden" name="hdnOldFile" value="<?php echo $rowus['image']; ?>">-->
    <input type="hidden" name="UserID" value="<?php echo $rowus['UserID']?>">
    <button type="submit" name="upload" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
    </div>
 