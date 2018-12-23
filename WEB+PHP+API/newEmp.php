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
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
        if($_SESSION['UserID'] == "1")
	{
               
		
	}	
        else {
             echo "<script>";
                echo "alert(\"คุณไม่มีสิทธิ์ในการเพิ่ม/แก้ไขข้อมูลพนักงาน!\");";
                echo "window.history.back()";
                
                echo "</script>";
        } mysqli_close($objCon);
?>
<?php include 'lockpage.php';?>
<body>
<div id="wrapper">
     <?php include('menu.php');?>
    <div class="container-fluid">
       <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#profile">Profile</a>
  </li>
  
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade show active" id="home">
    <form enctype="multipart/form-data" action="addEmp.php" method="POST">
           <fieldset>  
                <input type="radio" name="Status" value="1" id="Status" checked="checked"> ผ่านการตรวจสอบแล้ว
                <div class="form-group">
                <label class="col-form-label" >รหัสพนักงาน</label>
                    <input class="form-control" name="User_num" type="text" id="User_num"  >
                <label class="col-form-label" >Username</label>
                    <input class="form-control" name="Username" type="text" id="Username"  >
                <label class="col-form-label" >Password</label>
                    <input class="form-control" name="Password" type="text" id="Password"  >
                <label class="col-form-label" >Name</label>
                    <input class="form-control" name="Name" type="text" id="Name"   >
                <label class="col-form-label" >Lastname</label>
                    <input class="form-control" name="Lastname" type="text" id="Lastname"   >
                <label class="col-form-label" >Tel</label>
                    <input class="form-control" name="Tel" type="text" id="Tel"   >
                <label class="col-form-label" >Email</label>
                    <input class="form-control" name="Email" type="text" id="Email"   >
                <label class="col-form-label" >ที่อยู่</label>
                    <textarea class="form-control" name="A_Address"  id="A_Address" cols="50" rows="7" wrap="soft"></textarea>
                    </br>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input name="file1" type="file" /><br>
                
                <input type="submit" class="btn btn-primary" value="ยืนยัน" />
    </fieldset>
</form>
  </div>
  <div class="tab-pane fade" id="profile">
      <p>
          <?php 
            require 'index.php';
            $q = 'select * from member LEFT JOIN empStatus ON member.Status=empStatus.statusEmp_id';
            $result = mysqli_query($con,$q);
            mysqli_set_charset($con, "utf8");//
          ?>
      
<table border="1" class="table table-striped table-bordered table-hover" >
            <tr>
                <th>รหัสนักศึกษา</th>
                <th>Username</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th style="width: 90px">สถานะ</th>
                <th style="width: 90px">แก้ไข</th>  
                
            </tr>
            <?php 
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                
            <tr>
                <td><?php echo ($row['User_num']) ;?></td>
                <td><?php echo ($row['Username']) ;?></td>
                <td ><?php echo $row['Name'] ;?></td>
                <td ><?php echo $row['Lastname'] ;?></td>
                <td > <?php echo ($row['statusEmp_name']) ;?> </td>
                <td><a class="btn btn-warning " href="updateAllEmp.php?UserID=<?php echo ($row['UserID']) ;?>">แก้ไข</td>
                
            </tr>
            <?php
                }
                    mysqli_free_result($result);
                    musqli_close($con)
            ?>
        </table>

      </p>
  </div>
 
</div>
       <!-- <form enctype="multipart/form-data" action="addEmp.php" method="POST">
           <fieldset>  
                
               <legend>เพิ่มพนักงานใหม่</legend>
               <a class="btn btn-primary" style='float:right;' href="insertA.php" role="button" >เพิ่ม </a> 
                <input type="radio" name="Status" value="1" id="Status" checked="checked"> ผ่านการตรวจสอบแล้ว
                <div class="form-group">
                <label class="col-form-label" >รหัสพนักงาน</label>
                    <input class="form-control" name="User_num" type="text" id="User_num"  >
                <label class="col-form-label" >Username</label>
                    <input class="form-control" name="Username" type="text" id="Username"  >
                <label class="col-form-label" >Password</label>
                    <input class="form-control" name="Password" type="text" id="Password"  >
                <label class="col-form-label" >Name</label>
                    <input class="form-control" name="Name" type="text" id="Name"   >
                <label class="col-form-label" >Lastname</label>
                    <input class="form-control" name="Lastname" type="text" id="Lastname"   >
                <label class="col-form-label" >Tel</label>
                    <input class="form-control" name="Tel" type="text" id="Tel"   >
                <label class="col-form-label" >Email</label>
                    <input class="form-control" name="Email" type="text" id="Email"   >
                <label class="col-form-label" >ที่อยู่</label>
                    <textarea class="form-control" name="A_Address"  id="A_Address" cols="50" rows="7" wrap="soft"></textarea>
                    </br>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input name="file1" type="file" /><br>
                
                <input type="submit" value="Send File" />
    </fieldset>
</form>-->
      
        
    </div>
     
    </div>
</body>


