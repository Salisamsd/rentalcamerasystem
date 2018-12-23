<title>MANOCAMERA</title>
<?php include '../lockpage.php'; ?>
<div id="wrapper">
    <?php include('../menu.php'); ?>
    <div class="container-fluid" >
        
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="showrent2.php">รายการผ่านการตรวจสอบ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="showrent.php"> รายการรอการตรวจสอบ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="showrent5.php">รายการที่รับเครื่องแล้ว</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="showrent3.php">รายการเช่าสำเร็จ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="showrent4.php">ยกเลิกรายการเช่า</a>
                </li>
				<li class="nav-item">
                        <a class="nav-link" href="search.php">ค้นหา</a>
                    </li>
            </ul>
            
        </div>
    </nav>
        <?php include('rent2.php'); ?>

    </div>
</div>
</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

