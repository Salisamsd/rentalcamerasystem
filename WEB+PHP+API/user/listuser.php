<title>MANOCAMERA</title>
<?php include '../lockpage.php'; ?>
<div id="wrapper">
    <?php include('../menu.php'); ?>
    <div class="container-fluid" >
	 <?php 
    require '../index.php';
    $q = 'select * from users ';
    $result = mysqli_query($con,$q);
    mysqli_set_charset($con, "utf8");
    ?>
<table border="1" class="table table-striped table-bordered table-hover" >
            <tr>
                
                <th>ลำดับที่</th>
                <th>Username</th>
                <th style="width: 90px">รายละเอียด</th>
                <th>รายการเช่าทั้งหมด</th>
                
                
            </tr>
            <?php 
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                
            <tr>
                
                <td><?php echo ($row['Id']) ;?></td>
                <td ><?php echo $row['username'] ;?></td>
                <td style="width: 50px"><center><a class="btn btn-secondary " href="showDetail.php?Id=<?php echo ($row['Id']) ;?>" role="button">รายละเอียด</a></center></td>
                <td style="width: 50px"><center><a class="btn btn-warning " href="showRentlist.php?username=<?php echo ($row['username']) ;?>" role="button">รายการเช่า</a></center></td>
                
                
            </tr>
            <?php
                }
                    mysqli_free_result($result);
                    musqli_close($con)
            ?>
        </table>

    </div>
</div>
