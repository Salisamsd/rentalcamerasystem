<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
require '../index.php';
$username = $_GET['username'];
$qq = "select * from userimg1 where username='$username'";
$resitem = mysqli_query($con, $qq);
$rowitem = mysqli_fetch_array($resitem, MYSQLI_ASSOC);
?>
<?php include '../lockpage.php'; ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
    /*body {font-family: Arial, Helvetica, sans-serif;}*/

    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    #myImg1 {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg1:hover {opacity: 0.7;}
    /* The Modal (background) */

    #myImg2 {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg2:hover {opacity: 0.7;}


    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {    
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        /*    position: absolute;*/
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
</style>

<div id="wrapper">
    <?php include('../menu.php'); ?>
    <div class="container-fluid" > 

        <table border="1" class="table table-striped table-bordered table-hover" >

            <tr>

                <th>สำเนาบัตรประชาชน</th>
                <th>สำเนาทะเบียนบ้าน</th>
                <th>สำเนายืนยันที่อยู่</th>
            </tr>
            <tr>
                <td align="center"><img id="myImg" src="../userUpload/<?php echo ($rowitem['img1']); ?>" alt="สำเนาบัตรประชาชน" style="width:40%;"></td>
                <td align="center"><img id="myImg1" src="../userUpload/<?php echo ($rowitem['img2']); ?>" alt="สำเนาทะเบียนบ้าน" style="width:40%;"></td>
                <td align="center"><img id="myImg2" src="../userUpload/<?php echo ($rowitem['img3']); ?>" alt="สำเนายืนยันที่อยู่" style="width:40%;"></td>
            </tr>    
            <tr>
                <td> 

                    <h5 ><font color="red"><?php echo ($rowitem['status']); ?></font></h5>
                    <a class="btn btn-warning " href="u.php?username=<?php echo ($rowitem['username']); ?>">เอกสารไม่ผ่านการพิจารณา</br>
                        <a class="btn btn-danger " href="upS.php?username=<?php echo ($rowitem['username']); ?>">ยอมรับการตรวจสอบ

                            </td>
                            <td>
                                <h5><font color="red"><?php echo ($rowitem['status2']); ?></font></h5>
                                <a class="btn btn-warning "href="u2.php?username=<?php echo ($rowitem['username']); ?>"> เอกสารไม่ผ่านการพิจารณา</br>
                                    <a class="btn btn-danger " href="upS2.php?username=<?php echo ($rowitem['username']); ?>">ยอมรับการตรวจสอบ
                                        </td>
                                        <td>
                                            <h5><font color="red"><?php echo ($rowitem['status3']); ?></font></h5>
                                            <a class="btn btn-warning " href="u3.php?username=<?php echo ($rowitem['username']); ?>"> เอกสารไม่ผ่านการพิจารณา</br>
                                                <a class="btn btn-danger " href="upS3.php?username=<?php echo ($rowitem['username']); ?>">ยอมรับการตรวจสอบ
                                                    </td>
                                                    </tr>        </table>
                                                    <?php
                                                    require '../index.php';
                                                    $username = $_GET['username'];
                                                    $qqq = "select * from users where username='$username'";
                                                    $resitemm = mysqli_query($con, $qqq);
                                                    $rowitemm = mysqli_fetch_array($resitemm, MYSQLI_ASSOC);
                                                    ?>
                                                    <div class="w3-row">
                                                        <table border="1" class="table table-striped table-bordered table-hover" >
                                                            <tr>

                                                                <th>รายการ</th>
                                                                <th>ข้อมุลเช่า</th>

                                                            </tr>

                                                            <tr><td>ลำดับที่</td><td><?php echo $rowitemm['Id']; ?></td></tr>
                                                            <tr><td>username</td><td><?php echo $rowitemm['username']; ?></td></tr>
                                                            <tr><td>ชื่อจริง</td><td ><?php echo$rowitemm['name']; ?></td></tr>
                                                            <tr><td>นามสกุล</td><td><?php echo $rowitemm['lastname']; ?></td></tr>
                                                            <tr><td>วัน-เดือน-ปีเกิด</td><td><?php echo $rowitemm['bdate']; ?></td></tr>
                                                            <tr><td>บัตรประชาชน</td><td><?php echo $rowitemm['nationID']; ?></td></tr>
                                                            <tr><td>ที่อยู่ </td><td> <?php echo $rowitemm['address']; ?> 
                                                            <tr><td>E-mail</td><td> <?php echo $rowitemm['email']; ?> 
                                                            <tr><td>เบอร์โทรศัพท์</td><td> <?php echo $rowitemm['telephone']; ?> 
                                                                </td> 
                                                            </tr> 
                                                        </table>

                                                    </div>

                                                    <!-- The Modal -->
                                                    <div id="myModal" class="modal">
                                                        <span class="close">&times;</span>
                                                        <img class="modal-content" id="img01">
                                                        <div id="caption"></div>
                                                    </div>

                                                    <script>
                                                        // Get the modal
                                                        var modal = document.getElementById('myModal');

                                                        // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                        var img = document.getElementById('myImg');
                                                        var modalImg = document.getElementById("img01");
                                                        var captionText = document.getElementById("caption");
                                                        img.onclick = function () {
                                                            modal.style.display = "block";
                                                            modalImg.src = this.src;
                                                            captionText.innerHTML = this.alt;
                                                        }

                                                        // Get the <span> element that closes the modal
                                                        var span = document.getElementsByClassName("close")[0];

                                                        // When the user clicks on <span> (x), close the modal
                                                        span.onclick = function () {
                                                            modal.style.display = "none";
                                                        }
                                                        var modal = document.getElementById('myModal');

                                                        // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                        var img = document.getElementById('myImg1');
                                                        var modalImg = document.getElementById("img01");
                                                        var captionText = document.getElementById("caption");
                                                        img.onclick = function () {
                                                            modal.style.display = "block";
                                                            modalImg.src = this.src;
                                                            captionText.innerHTML = this.alt;
                                                        }

                                                        // Get the <span> element that closes the modal
                                                        var span = document.getElementsByClassName("close")[0];

                                                        // When the user clicks on <span> (x), close the modal
                                                        span.onclick = function () {
                                                            modal.style.display = "none";
                                                        }

                                                        var modal = document.getElementById('myModal');

                                                        // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                        var img = document.getElementById('myImg2');
                                                        var modalImg = document.getElementById("img01");
                                                        var captionText = document.getElementById("caption");
                                                        img.onclick = function () {
                                                            modal.style.display = "block";
                                                            modalImg.src = this.src;
                                                            captionText.innerHTML = this.alt;
                                                        }

                                                        // Get the <span> element that closes the modal
                                                        var span = document.getElementsByClassName("close")[0];

                                                        // When the user clicks on <span> (x), close the modal
                                                        span.onclick = function () {
                                                            modal.style.display = "none";
                                                        }
                                                    </script>
                                                    </div>