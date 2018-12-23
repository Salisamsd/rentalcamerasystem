<?php include '../lockpage.php';?>
<div id="wrapper">
    <?php include('../menu.php');?>
    <div class="container-fluid" >
        <h3 align="left">  Lense DSLR</h3>
            <a class="btn btn-info " href="listDSLR_Body.php" role="button">Body</a>
            <a class="btn btn-info " href="listDSLR_BL.php" role="button">Body+Lense</a>
            <a class="btn btn-info " href="listDSLR_L.php" role="button">Lense</a>
            <a class="btn btn-info " href="listDSLR_A.php" role="button">Accessory</a>
            <a class="btn btn-primary" style='float:right;' href="insertL.php" role="button" >เพิ่ม </a> </br>
        
           
        <?php include('dslr_L.php');?>
        
    </div>
    </div>
</body>
</html>
