<title>MANOCAMERA</title>
<?php include '../lockpage.php'; ?>
<div id="wrapper">
    <?php include('../menu.php'); ?>
    <div class="container-fluid" >

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="showrent.php">ค้นหา</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="showrent2.php">รายการผ่านการตรวจสอบ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showrent5.php">รายการที่รับเครื่องแล้ว</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showrent3.php">รายการเช่าสำเร็จ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showrent4.php">ยกเลิกรายการเช่า</a>
                    </li>
					
                </ul>
            </div>
        </nav>
      	<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
	<form class="form-inline my-2 my-lg-0" name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
      <input class="form-control mr-sm-2" name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>" >
      <button class="btn btn-secondary my-2 my-sm-0" type="submit" value="Search">Search</button>
    </form>
<?php

   
	require '../index.php';
  
	
   $sql = "SELECT * FROM rentlist LEFT JOIN statusR ON rentlist.status= statusR.id WHERE rentID LIKE '%".$strKeyword."%' or item_name LIKE '%".$strKeyword."%' or username LIKE '%".$strKeyword."%' ";

   $query = mysqli_query($con,$sql);

?>
<table border="1" class="table table-striped table-bordered table-hover" >
  <tr>
    <th width="91"> <div align="center">หมายเลข </div></th>
	  <th width="98"> <div align="center"> รายการเช่า </div></th>
    <th width="98"> <div align="center"> Username </div></th>
     <th width="98"> <div align="center"> สถานะ </div></th>
    
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><?php echo $result["rentID"];?></td>
	  <td><?php echo $result["item_name"];?></td>
    <td><?php echo $result["username"];?></td>
     <td><?php echo $result["statusR_name"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($con);
?>


    </div>
</div>

