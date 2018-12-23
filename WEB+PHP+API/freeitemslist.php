<!DOCTYPE html>
<?php 
    require 'index.php';//ไปเรียกการเชื่อมต่อจากหน้าindex
    $qf = 'select * from freeitems LEFT JOIN items ON freeitems.item_id=items.item_id LEFT JOIN Status ON freeitems.status_id=Status.status_id';//เรียกtable
    $result = mysqli_query($con,$qf);//แสดงผลจากquery
    mysqli_set_charset($con, "utf8");//setthai
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>แสดงข้อมูลสินค้า</title>
        <style>
            table,th,td{
                border: 1px solid black;
                border-collapse: collapse;
                
            }
        </style>
    </head>
    <body>
        <a href="freeiteminsert.php">เพิ่ม</a>
        <table border="1" >
            <tr>
                
                <th>Model</th> <!--thคือคอลัมน์-->
                <th style="width: 300px">ชื่อ</th>
                <th style="width: 90px">สำหรับ</th>
                <th style="width: 90px">สถานะ</th>
                <th style="width: 90px">แก้ไข</th>  
                <th style="width: 90px">ลบ</th>
            </tr>
            <?php //ประกาศให้rowเอาค่าของdatabaseดึงออกมา
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                
            <tr>
                
                <td><?php echo ($row['ft_model']) ;?></td> <!--php echo $row คือดึงข้อมูลจากดาต้าเบสโดยการเรียกข้อมูลในคอลัมน์ออกมา-->
                <td style="width: 300px"> <?php echo nl2br($row['ft_name']) ;?></td>
                <td><?php echo $row['item_model'] ;?></td>
                <td><?php echo $row['status_name'] ;?></td>
                <td><a href="freeitemupdate.php?ft_id=<?php echo ($row['ft_id']) ;?>">แก้ไข</td>
                <td><a href="delete.php?item_id=<?php echo ($row['item_id']) ;?>">ลบ</td>
            </tr>
            <?php
                }
                    mysqli_free_result($result);
                    musqli_close($con)
            ?>
        </table>
    </body>
</html>
