<style>
    * {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 20px;
    height: 180px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>

<?php
require '../index.php';
$item_id = $_GET['item_id'];
$qus = "select * from items where item_id='$item_id'";
$resus = mysqli_query($con, $qus);
$rowus = mysqli_fetch_array($resus,MYSQLI_ASSOC);

?>

    <!DOCTYPE html>
<?php include '../lockpage.php';?>
<div id="wrapper">
     <?php include('../menu.php');?>
    <div class="container-fluid">
        <form action="uptovdoL.php" method="POST" enctype="multipart/form-data">
                <label><b>ยี่ห้อ</b></label>
                <input type="radio" name="brand_id" value="1" id="brand_id" <?php if ($rowus['brand_id']=='1') echo 'checked';  ?> >Canon    
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="2" id="brand_id" <?php if ($rowus['brand_id']=='2') echo 'checked';  ?> >Fujifilm
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="3" id="brand_id" <?php if ($rowus['brand_id']=='3') echo 'checked';  ?> >Leica
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="4" id="brand_id" <?php if ($rowus['brand_id']=='4') echo 'checked';  ?> >Nikon
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="5" id="brand_id" <?php if ($rowus['brand_id']=='5') echo 'checked';  ?> >Olympus
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="6" id="brand_id" <?php if ($rowus['brand_id']=='6') echo 'checked';  ?> >Sony
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="8" id="brand_id" <?php if ($rowus['brand_id']=='8') echo 'checked';  ?> >Gopro
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="7" id="brand_id" <?php if ($rowus['brand_id']=='7') echo 'checked';  ?> >etc.
                
                <label><b>รูปแบบอุปกรณ์</b></label>
                <input type="radio" name="option_id" value="1" id="option_id" <?php if ($rowus['option_id']=='1') echo 'checked';  ?> >
                Body    
                <input type="radio" name="option_id" value="2" id="option_id" <?php if ($rowus['option_id']=='2') echo 'checked';  ?> >
                Body+Lense
                <input type="radio" name="option_id" value="3" id="option_id" <?php if ($rowus['option_id']=='3') echo 'checked';  ?> >
                Lense
                <input type="radio" name="option_id" value="4" id="option_id" <?php if ($rowus['option_id']=='4') echo 'checked';  ?> >
                Accessory
                <label><b>ประเภทสินค้า</b></label>
                <input type="radio" name="type_id" value="1" id="type_id" <?php if ($rowus['type_id']=='1') echo 'checked';  ?> >
                DSLR 
                <input type="radio" name="type_id" value="2" id="type_id" <?php if ($rowus['type_id']=='2') echo 'checked';  ?> >
                Mirrorless 
                <input type="radio" name="type_id" value="3" id="type_id" <?php if ($rowus['type_id']=='3') echo 'checked';  ?> >
                Video 
                <input type="radio" name="type_id" value="4"id="type_id" <?php if ($rowus['type_id']=='4') echo 'checked';  ?> >
                Action 
                <input type="radio" name="type_id" value="5" id="type_id" <?php if ($rowus['type_id']=='5') echo 'checked';  ?> >
                Accessories
                
                <label>สถานะ</label>
                    
                <input type="radio" name="status_id" value="1" id="status_id" <?php if ($rowus['status_id']=='1') echo 'checked';  ?> >
                        พร้อมใช้งาน
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status_id" value="2" id="status_id" <?php if ($rowus['status_id']=='2') echo 'checked';  ?> >
                        ชำรุด
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status_id" value="3" id="status_id" <?php if ($rowus['status_id']=='3') echo 'checked';  ?> >
                        กำลังซ่อมแซม
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status_id" value="4" id="status_id" <?php if ($rowus['status_id']=='4') echo 'checked';  ?> >
                        หาย
                <div class="form-group">
                <label class="col-form-label" >Model:</label><input class="form-control" name="item_model" type="text" id="item_model" size="20" value="<?php echo $rowus['item_model']; ?>">
                <label class="col-form-label">ชื่อรุ่น:</label><input class="form-control" name="item_name" type="text" id="item_name" size="49" value="<?php echo $rowus['item_name']; ?>" >
                <label class="col-form-label">Spec:</label><textarea class="form-control"  name="item_description"  id="item_description" cols="80" rows="5" wrap="soft"><?php echo $rowus['item_description']; ?></textarea>
               <div class="row">
                <div class="column" >
                 <table>
                     <td><b>ราคา</b></td></br>
                    <tr>
                         <td>ราคาเครื่อง :</td>
                         <td><input class="form-control"  name="item_price" type="text" id="item_price" size="21" value="<?php echo number_format($rowus['item_price']); ?>">บาท</td>
                    </tr>
                    <tr> 
                        <td>ราคาต่อวัน :</td> 
                         <td><input class="form-control" name="item_priceperday" type="text" id="item_priceperday" size="21" value="<?php echo number_format($rowus['item_priceperday']); ?>" >บาท/วัน</td>
                    </tr>
                    <tr>
                    <th>รูปที่1  </th>
                    <td>
                    <img src="../itempic/<?php echo ($rowus['img1']);?>" width="80px" height="60px">
                    <br>
                    <input type="file" name="img1"/>
                    <input type="hidden" name="old_image" value="<?php echo ($rowus['img1']);?>">
                    <!--<input type="submit" value="update" name='update'>-->
                    <input type="submit" value="update" name='update' class="btn btn-primary" >
                    </td>
                </tr>
                 
                 </table>
                </div>
                <div class="column" >  
                 <table>
                    <td><b>วงเงินประกัน</b></td></br>
                    <tr> 
                        <td>เงินประกันแบบที่1 :</td>
                        <td><input class="form-control" name="deposit_1" type="text" id="deposit_1" size="20" value="<?php echo number_format($rowus['deposit_1']); ?>"> บาท</td>
                    </tr>
                    <tr> <td>เงินประกันแบบที่2 :</td>
                        <td><input class="form-control" name="deposit_2" type="text" id="deposit_2" size="20" value="<?php echo  number_format($rowus['deposit_2']); ?>">  บาท</td>
                    </tr>
                    <tr>
                   <th>รูปที่2  </th>
                    <td>
                    <img src="../itempic/<?php echo ($rowus['img2']);?>" width="80px" height="60px" >
                    <br>
                    <input type="file" name="img2"/><br>
                    <input type="hidden" name="old_image1" value="<?php echo ($rowus['img2']);?>">
                    <input type="hidden" name="item_id" value="<?php echo $rowus['item_id']; ?>">
                    
                    </td>
                </tr>
                </div>
                   </div></div>
        </form>
</div></div>
    