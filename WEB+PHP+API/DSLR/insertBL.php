
 <title>MANOCAMERA</title><style>
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
	session_start();
        $serverName = "localhost";
	$userName = "manocame";
	$userPassword = "Pern1234";
	$dbName = "main";
	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
        ?>
<?php include '../lockpage.php';?>
<body>
<div id="wrapper">
     <?php include('../menu.php');?>
    <div class="container-fluid">
        <h2>DSLR</h2>
        <form enctype="multipart/form-data" action="addBL.php" method="POST">
           <fieldset>  
            
                <label><b>ยี่ห้อ</b></label>
                <input type="radio" name="brand_id" value="1" id="brand_id"  >Canon    
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="2" id="brand_id"  >Fujifilm
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="3" id="brand_id"  >Leica
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="4" id="brand_id"  >Nikon
                <br><br>
                <input type="radio" name="brand_id" value="5" id="brand_id"  >Olympus
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="6" id="brand_id"  >Sony
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="8" id="brand_id"  >Gopro
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="brand_id" value="7" id="brand_id"  >etc.
                
                <label><b>รูปแบบอุปกรณ์</b></label>
                
                <input type="radio" name="option_id" value="2" id="option_id" checked="checked" >
                Body+Lense
                
                <label><b>ประเภทสินค้า</b></label>
                <input type="radio" name="type_id" value="1" id="type_id" checked="checked"> DSLR 
                
                
                <label>สถานะ</label>
                    
                <input type="radio" name="status_id" value="1" id="status_id" checked="checked"  >
                        พร้อมใช้งาน
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status_id" value="2" id="status_id"  >
                        ชำรุด
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status_id" value="3" id="status_id"  >
                        กำลังซ่อมแซม
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status_id" value="4" id="status_id"  >
                        หาย
                 
                <div class="form-group">
                <label class="col-form-label" >พนักงานที่เพิ่มข้อมูล:</label><input class="form-control" name="emp" type="text" id="emp" size="20" value="<?php echo $objResult["Name"];?>" >
                <label class="col-form-label" >Model:</label><input class="form-control" name="item_model" type="text" id="item_model" size="20" >
                <label class="col-form-label" >ชื่อรุ่น:</label><input class="form-control" name="item_name" type="text" id="item_name" size="49"  >
                <label class="col-form-label" >Spec:</label><textarea class="form-control" name="item_description"  id="item_description" cols="50" rows="7" wrap="soft"></textarea>
  
  
               <div class="row">
                <div class="column" >
                 <table>
                     <td><b>ราคา</b></td></br>
                    <tr>
                         <td>ราคาเครื่อง :</td>
                         <td><input class="form-control"  name="item_price" type="text" id="item_price" size="21">บาท</td>
                    </tr>
                    <tr> 
                        <td>ราคาต่อวัน :</td> 
                         <td><input class="form-control" name="item_priceperday" type="text" id="item_priceperday" size="21"  >บาท/วัน</td>
                    </tr>
                 </table>
                </div>
                <div class="column" >  
                 <table>
                    <td><b>วงเงินประกัน</b></td></br>
                    <tr> 
                        <td>เงินประกันแบบที่1 :</td>
                        <td><input class="form-control" name="deposit_1" type="text" id="deposit_1" size="20"  > บาท</td>
                    </tr>
                    <tr> <td>เงินประกันแบบที่2 :</td>
                        <td><input class="form-control" name="deposit_2" type="text" id="deposit_2" size="20" > บาท</td>
                    </tr>
                </table>
                </div>
                </div>
            
                      <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                      เพิ่มรูป 1:<input name="img1" type="file" /><br>
                      เพิ่มรูป 2:<input name="img2" type="file" /><br>
                      <input type="submit" name="upload" value="Send File" />
    </fieldset>
</form>
      
        
    </div>
     
    </div>
</body>