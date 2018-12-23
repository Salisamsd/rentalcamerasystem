<title>MANOCAMERA</title>
<?php include '../lockpage.php'; ?>
<div id="wrapper">
    <?php include('../menu.php'); ?>
    <div class="container-fluid" >
<?php 
    require '../index.php';
	$username = $_GET['username'];
    $q = "select * from rentlist WHERE username='$username'" ;
    $result = mysqli_query($con,$q);
    mysqli_set_charset($con, "utf8");
    ?>
<table border="1" class="table table-striped table-bordered table-hover" >
           
	
	<tr>
                
                <th>หมายเลขเช่า</th>
                <th>รุ่น</th>
                <th style="width: 90px">รายละเอียด</th>
                
                
                
            </tr>
            <?php 
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                
            <tr>
                
                <td><?php echo ($row['rentID']) ;?></td>
                <td ><?php echo $row['item_name'] ;?></td>
                
                <td style="width: 50px"><center><a class="btn btn-secondary " href="rentlist.php?rentID=<?php echo ($row['rentID']) ;?>" role="button">รายละเอียด</a></center></td>
                
                
                
            </tr>
            <?php
                }
                    mysqli_free_result($result);
                    musqli_close($con)
            ?>
        </table>


    </div>
</div>

