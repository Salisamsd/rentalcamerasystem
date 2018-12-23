<?php
require '../index.php';
$q = 'select * from userimg1 ';
$result = mysqli_query($con, $q);
mysqli_set_charset($con, "utf8");
?>
<title>MANOCAMERA</title>
<?php include '../lockpage.php'; ?>
<div id="wrapper">
    <?php include('../menu.php'); ?>
    <div class="container-fluid" >
        <table border="1" class="table table-striped table-bordered table-hover" >
            <tr>

                <th>หมายเลขเช่า</th>
                
                <th style="width: 90px">รายละเอียด</th>



            </tr>
            <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>

                <tr>

                    <td><?php echo ($row['username']); ?></td>
                    

                    <td style="width: 50px"><center><a class="btn btn-secondary " href="checkimg.php?username=<?php echo ($row['username']); ?>" role="button">รายละเอียด</a></center></td>



                </tr>
                <?php
            }
            mysqli_free_result($result);
            musqli_close($con)
            ?>
        </table>


    </div>
</div>
</body>
</html>
