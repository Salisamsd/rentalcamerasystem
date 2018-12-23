<?php
require 'index.php';
$id= $_GET['id'];
$qfu = "SELECT * FROM freeshow WHERE id='$id'";
$resfu = mysqli_query($con, $qfu);
$rowfu = mysqli_fetch_array($resfu,MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>แก้ไขข้อมูลของอุปกรณ์ที่ให้ไปด้วย</title>
        <style>
            label{
                display: block;
            }
            
        </style>
    </head>
    <body>
        <h2>แก้ข้อมูลอุปกรณ์</h2>
        <form action="updatefreeitem.php" method="post" enctype="mulitpart/form-data" id="form1">
            <fieldset>
     
          
                <label>เป็นของ:</label><input name="item_name" type="text" id="item_name" size="49" value="<?php echo $rowfu['item_name']; ?>">
               <label>Spec:</label><textarea  name="ft_name"  id="ft_name" cols="80" rows="5" wrap="soft"><?php echo $rowfu['ft_name']; ?></textarea>
                <br>           

                        <input type="hidden" name="id" value="<?php echo $rowfu['id']?>">
                       <input name="submit" type="submit" value="ยืนยัน">
            </fieldset>
        </form>
    </body>
</html>
