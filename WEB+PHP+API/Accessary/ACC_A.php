<?php 
    require '../index.php';
    $q = 'select * from items LEFT JOIN option ON items.option_id=option.option_id LEFT JOIN brands ON items.brand_id=brands.brand_id LEFT JOIN types ON items.type_id=types.type_id LEFT JOIN Status ON items.status_id=Status.status_id WHERE items.option_id = "4" and items.type_id="5"';
    $result = mysqli_query($con,$q);
    mysqli_set_charset($con, "utf8");
    ?>
<table border="1" class="table table-striped table-bordered table-hover" >
            <tr>
                
                <th>Model</th>
                <th>รุ่น</th>
                <!--<th style="width: 300px">รายละเอียด</th>
                <th style="width: 90px">แบบ</th>
                <th style="width: 90px">ราคาเครื่อง</th>
                <th style="width: 90px">ราคาเช่าต่อวัน</th>
                <th style="width: 90px">วางมัดจำแบบที่1</th>
                <th style="width: 90px">วางมัดจำแบบที่2</th>
                <th style="width: 90px" >ประเภท</th>-->
                <th style="width: 90px" >รายละเอียด</th>
                <th style="width: 90px">สถานะ</th>
                <th style="width: 90px">แก้ไข</th>  
                <th style="width: 90px">ลบ</th>
            </tr>
            <?php 
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                
            <tr>
                
                <td><?php echo ($row['item_model']) ;?></td>
                <td ><?php echo $row['item_name'] ;?></td>
                <!--<td style="width: 300px"> <?php echo nl2br($row['item_description']) ;?></td>
                <td><?php echo $row['name'] ;?></td>
                <td><?php echo number_format($row['item_price']) ;?></td>
                <td><?php echo number_format($row['item_priceperday']) ;?></td>
                <td><?php echo number_format($row['deposit_1']) ;?></td>
                <td><?php echo number_format($row['deposit_2']) ;?></td>
                <td><?php echo $row['type_name'] ;?></td>
                <td><?php echo $row['brand_name'] ;?></td>-->
                <td style="width: 50px"><center><a class="btn btn-secondary " href="../showDetail.php?item_id=<?php echo ($row['item_id']) ;?>" role="button">รายละเอียด</a></center></td>
                <td><?php echo $row['status_name'] ;?></td>
                <td><a class="btn btn-warning " href="updateaccA.php?item_id=<?php echo ($row['item_id']) ;?>">แก้ไข</td>
                <td><a class="btn btn-danger " href="deleteaccA.php?item_id=<?php echo ($row['item_id']) ;?>">ลบ</td>
            </tr>
            <?php
                }
                    mysqli_free_result($result);
                    musqli_close($con)
            ?>
        </table>
