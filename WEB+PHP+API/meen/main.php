<style>
    
    .card1 {
    background-color: MistyRose;
    padding: 30px;
    margin-top: 10px;
    
}
 
    
    .column {
    float: left;
    width: 35%;
    padding: 10px;
}
    .column1 {
    float: right;
    width: 65%;
    padding: 10px;
}
    .column2 {
    float: center;
    width: 100%;
    padding: 10px;
}
/* Clear floats after the columns */
    .row:after {
    content: "";
    display: table;
    clear: both;
}
</style>
 <title>MANOCAMERA</title>
<?php // ใครเป็ยคนloginเข้ามา
	session_start();
	$serverName = "localhost";
	$userName = "manocame";
	$userPassword = "Pern1234";
	$dbName = "main";
	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<?php include 'lockpage.php';?>
<div id="wrapper">
    <?php include('menu.php');?>
    
    <div class="container-fluid" >
        <div class="row">
         <div class= "column card1"  >
             <center><img src="../upload/<?php echo $objResult["image"];?>" width="340px" height="300px" >
        <h1><?php echo $objResult["Username"];?></h1>
        <p class="title"><?php echo $objResult["Name"];?></p>
        <p><a class="btn btn-info " href="adminupdate.php" role="button">แก้ไขข้อมูลส่วนตัว</a></p></center>
        </div>
            <div class= "column1 card1" >
                <center><img src="../image/f0bbdd235de94dab5f22f07fb40166c4.png" height="300px" >
                    <h1>เพิ่ม/แก้พนักงานใหม่</h1>
                    <p class="title">เฉพาะผู้ที่มีสิทธิ์ผ่านเท่านั้น</p>
                    <p><a class="btn btn-info " href="newEmp.php" role="button">เพิ่ม / แก้ไข พนักงาน</a></p></center>
        </div>
<!--            <div class= "column2 card1"  >
             <center><img src="upload/<?php echo $objResult["image"];?>" width="340px" height="300px" >
        <h1><?php echo $objResult["Username"];?></h1>
        <p class="title"><?php echo $objResult["Name"];?></p>
        <p><a class="btn btn-info " href="updateAllEmp.php" role="button">แก้ไขข้อมูลส่วนตัว</a></p></center>
        </div>-->
            
        </div>

        </div>
    </div>
    </div>
        
    
</div>
  



  
