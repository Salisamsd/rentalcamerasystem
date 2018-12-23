<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
require '../index.php';
$id = $_GET['id'];
$qq = "select * from rentlist where id='$id'";
$resitem = mysqli_query($con, $qq);
$rowitem = mysqli_fetch_array($resitem, MYSQLI_ASSOC);
?>
<?php include '../lockpage.php'; ?>

<style>
    .block-1 {
        width: 100px;
        height: 40px;
        margin: 20px;

        float: left;
    }
    .block-2 {

        margin: 20px;
        float: left;
    }


</style>

<div id="wrapper">
    <?php include('../menu.php'); ?>

    <div class="container-fluid" >
        <input type="button" class="block-1 btn btn-info" onClick="history.back()" value="<< BACK" /> 


        <div class="w3-row">
            <table border="1" class="table table-striped table-bordered table-hover" >
                <tr>

                    <th>รายการ</th>
                    <th>ข้อมุลเช่า</th>

                </tr>

                <tr><td>หลายเลขเช่า</td><td><?php echo $rowitem['rentID']; ?></td></tr>
                <tr><td>ชื่อสินค้า</td><td><?php echo $rowitem['item_name']; ?></td></tr>
                <tr><td>วันที่รับ</td><td ><?php echo$rowitem['sdate']; ?></td></tr>
                <tr><td>วันที่คืน</td><td><?php echo $rowitem['edate']; ?></td></tr>
                <tr><td>ค่าเช่าทั้งหมด</td><td><?php echo $rowitem['total']; ?></td></tr>
                <tr><td>รูปแบบการเช่า </td><td>รูปแบบที่ <?php echo $rowitem['rentFormat']; ?></td></tr>
                <tr><td>ผู้เช่า </td><td> <?php echo $rowitem['username']; ?> 
                    </td> 
                </tr> 
                <tr><td>สัญญาเช่า </td><td> <a class="btn btn-warning" href='Charter.php?rentID=<?php echo ($rowitem['rentID']); ?>' target='_blank' class='demo'>คลิ๊กเพื่อพิมพ์ </a>
                    </td> 
                </tr> 
            </table>

            

            <center><a class="btn btn-primary"  href="conf2.php?id=<?php echo ($rowitem['id']); ?>" role="button">รับเครื่องแล้ว</a>
                <a class="btn btn-danger"  href="conf3.php?id=<?php echo ($rowitem['id']); ?>" role="button">ยกเลิกการเช่า</a></center>


        </div>





    </div>

</div>