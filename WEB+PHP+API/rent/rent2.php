<?php 
    require '../index.php';
    $q = 'select * from rentlist WHERE status_r = "2" and status="2"';
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
                
                <td style="width: 50px"><center><a class="btn btn-secondary " href="showDetail2.php?id=<?php echo ($row['id']) ;?>" role="button">รายละเอียด</a></center></td>
                
                
                
            </tr>
            <?php
                }
                    mysqli_free_result($result);
                    musqli_close($con)
            ?>
        </table>
