<?php include '../lockpage.php';?>
<div id="wrapper">
    <?php include('../menu.php');?>
    <div class="container-fluid" >
        <h3 align="left">  Accessary Mirrorlees</h3>
            <a class="btn btn-info " href="listML_Body.php" role="button">Body</a>
            <a class="btn btn-info " href="listML_BL.php" role="button">Body+Lense</a>
            <a class="btn btn-info " href="listML_L.php" role="button">Lense</a>
            <a class="btn btn-info " href="listML_A.php" role="button">Accessory</a>
            <a class="btn btn-primary " style='float:right;' href="insertML_A.php" role="button" >เพิ่ม </a>
        
        <?php include('ML_A.php');?>
        
    </div>
    </div>
</body>
</html>
