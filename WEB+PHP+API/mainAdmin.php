
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
?>
<?php include 'lockpage.php';?>
<div id="wrapper">
    <?php include('menu.php');?>
    
    <div class="container-fluid" >
        <div class="row">
         <div class= "column card1"  >
             <h3>ลองดู</h3>
             <!--<center><img src="image/<?php echo $objResult["image"];?>" width="300px" height="200px" >
        <h1><?php echo $objResult["Username"];?></h1>
        <p class="title"><?php echo $objResult["Name"];?></p>
        <p><a class="btn btn-info " href="adminupdate.php" role="button">Edit Profile</a></p></center>-->
        </div>
            <div class= "column1 card1" >
                <center><img src="image/f0bbdd235de94dab5f22f07fb40166c4.png" height="200px" >
                    <h1>เพิ่มพนักงานใหม่</h1>
                  
                    <p class="title"><?php echo $objResult["Name"];?></p>
        <p><a class="btn btn-info " href="listDSLR_Body.php" role="button">Edit Profile</a></p></center>
        </div>
            
        </div>

        </div>
    </div>
    </div>
        
    
             <!--<div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card" >
                        <img src="image/1111.jpg"height="200px" >
                        <h1><?php echo $objResult["Username"];?></h1>
                        <p class="title"><?php echo $objResult["Name"];?></p>
                        <p><button>Contact</button></p>
                        </div> 
                    </div>

                </div>
            </div>
  </div>-->
</div>
  



  
