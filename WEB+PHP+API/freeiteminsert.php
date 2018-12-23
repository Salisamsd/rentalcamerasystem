<?php
require 'index.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>เพิ่มข้อมูลของอุปกรณ์ที่ให้ไปด้วย</title>
        <style>
            label{
                display: block;
            }
            
        </style>
    </head>
    <body>
        <h2>เพิ่มข้อมูลอุปกรณ์</h2>
        <form action="addfreeitem.php" method="post" enctype="mulitpart/form-data" id="form1">
            <fieldset>
               
          
                 
                
                <label>เป็นของ:</label><input name="item_name" type="text" id="item_name" size="49"  >
                <label>ข้อมูล:</label><textarea  name="ft_name"  id="ft_name" cols="50" rows="7" wrap="soft"></textarea>

                        <br>
                       <input name="submit" type="submit" value="ยืนยัน">
            </fieldset>
        </form>
    </body>
</html>
