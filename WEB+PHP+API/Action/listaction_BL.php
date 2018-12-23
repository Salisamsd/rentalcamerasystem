<?php include '../lockpage.php';?>
<div id="wrapper">
    <?php include('../menu.php');?>
    <div class="container-fluid" >
        <h3 align="left">  Body+Lense Action</h3>
            <a class="btn btn-info " href="listaction_B.php" role="button">Body</a>
            <a class="btn btn-info " href="listaction_BL.php" role="button">Body+Lense</a>
            <a class="btn btn-info " href="listaction_L.php" role="button">Lense</a>
            <a class="btn btn-info " href="listaction_A.php" role="button">Accessory</a>
            <a class="btn btn-primary " style='float:right;' href="insertaction_BL.php" role="button" >เพิ่ม </a>
        
        <?php include('action_BL.php');?>
        
    </div>
    </div>
</body>
</html>
