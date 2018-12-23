 <title>MANOCAMERA</title>
<?php
require 'index.php';
$UserID= $_GET['UserID'];
$qus = "select *from member where UserID= '$UserID'";
$resus = mysqli_query($con, $qus);
$rowus = mysqli_fetch_array($resus,MYSQLI_ASSOC);
?>
<?php include 'lockpage.php';?>
<div id="wrapper">
    <?php include('menu.php');?>
    
    <div class="container-fluid" >
        <form action="upAllEmp.php" method="post" enctype="mulitpart/form-data" id="form1">
  <fieldset>
    <legend>แก้ไขข้อมูลส่วนตัว</legend>
    <div class="form-group">
     <label class="col-form-label" >รหัสพนักงาน</label>
        <input type="text" class="form-control"  id="User_num" name="User_num"  value="<?php echo $rowus['User_num']; ?>" >
     <label class="col-form-label" >Username</label>
        <input type="text" class="form-control" placeholder="Username" id="Username" name="Username"  value="<?php echo $rowus['Username']; ?>" >
      <label class="col-form-label" >Password</label>
        <input type="text" class="form-control" placeholder="Password" id="Password" name="Password"  value="<?php echo $rowus['Password']; ?>" >
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
    <label><b>สถานะของพนักงาน</b></label>
                <input type="radio" name="Status" value="1" id="Status" <?php if ($rowus['Status']=='1') echo 'checked';  ?> >
                เป็นพนักงานอยู่  
                <input type="radio" name="Status" value="2" id="Status" <?php if ($rowus['Status']=='2') echo 'checked';  ?> >
                ลาออก/ยกเลิกสัญญาจ้าง
   
      <label>รูปภาพ</label>
       <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
       <img src="upload/<?php echo $rowus['image']; ?>" width="50%"><br>
      <!--<input name="file1" type="file" />
      <input type="hidden" name="hdnOldFile" value="<?php echo $rowus['image']; ?>">
      <small id="fileHelp" class="form-text text-muted">กรุณาใส่ภาพที่ระบุตัวตนของคุณ</small>-->
    
   
    
    <input type="hidden" name="UserID" value="<?php echo $rowus['UserID']?>">
    <button type="submit" name="upload" class="btn btn-primary">Submit
        
</form>
    </div>