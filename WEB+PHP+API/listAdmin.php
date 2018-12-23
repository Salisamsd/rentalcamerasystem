<!DOCTYPE html>
<?php
  require 'index.php';//ตัวเชื่อมหน้า index
  $qa = ' select * from member ';
  $result = mysqli_query($con,$qa);//แสดงผลจากหน้าหลักและqa
  mysqli_set_charset($con, "utf8");//setภาษาthai
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>แสดงAdmin</title>
        <style>
            table,th,td{
                border: 1px solid black;
                border-collapse: collapse;
                
            }
        </style>
    </head>
    <body>
        <table border="1" >
            <tr>
                
                 <!--thคือคอลัมน์-->
                <th style="width: 150px">Username</th>
                <th style="width: 200px">Name</th>
                <th style="width: 200px">Lastname</th>
                <th style="width: 90px">แก้ไข</th>  
                <th style="width: 90px">ลบ</th>
            </tr>
            <?php //ประกาศให้rowเอาค่าของdatabaseดึงออกมา
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
            <tr>
                <td><?php echo ($row['Username']);?></td>
                <td><?php echo ($row['Name']);?></td>
                <td><?php echo ($row['Lastname']);?></td>
                <td><a href="adminupdate.php?UserID=<?php echo ($row['UserID']);?>">แก้ไข</td>
                <td><a href="">ลบ</td>
            </tr>
            <?php
                }
                    mysqli_free_result($result);
                    musqli_close($con)
            ?>
        </table>
    </body>
</html>
