<html>
    <head>
        <?php
        require '../index.php';
        $rentID = $_GET['rentID'];
        $qq = "select * from rentlist LEFT JOIN users ON rentlist.username=users.username LEFT JOIN items ON rentlist.item_name=items.item_name where rentID='$rentID'";
        $resitem = mysqli_query($con, $qq);
        $rowitem = mysqli_fetch_array($resitem, MYSQLI_ASSOC);
        $today = date("d-m-Y");
        $thai_day_arr = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
        $thai_month_arr = array(
            "0" => "",
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
            );

            function thai_date($time) {
                global $thai_day_arr, $thai_month_arr;
               // $thai_date_return = "วัน" . $thai_day_arr[date("w", $time)];
                $thai_date_return .=  date("j", $time);
                $thai_date_return .= " เดือน" . $thai_month_arr[date("n", $time)];
                $thai_date_return .= " พ.ศ." . (date("Y", $time) + 543);
                //$thai_date_return.= "  ".date("H:i",$time)." น.";
                return $thai_date_return;
            }

            //$sdate = strtotime("$sdate");
            //$sdate = thai_date($sdate);

            
?>

        <SCRIPT LANGUAGE="JavaScript">
            function printPage() {
                if (window.print)
                    window.print()
                else
                    alert("Sorry, your browser doesn't support this feature.");
            }
        </SCRIPT>
        <style>
            .pull-left {float:left;}

            .pull-right {float:right;}

            .text-center {text-align:center;}
        </style>
        <title>  &nbsp;&nbsp;&nbsp; </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <LINK href="test.css" type="text/css" rel=stylesheet>

    </head>
    <body>
<input type="button" name="Button" value="Print" onclick="javascript:this.style.display = 'none';window.print();">
        <span class="pull-right " >  &nbsp;  &nbsp;  &nbsp;  &nbsp; หมายเลขเช่า : <?php echo $rowitem['rentID']; ?><br>
            เขียนที่ร้าน Manocamera  ชั้น12 ตึกฟรอนเทจ<br> โรงแรมเอเชีย ราชเทวี กรุงเทพ <br>
            &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;วันที่ 
            <u>  &nbsp; 
                <?php echo thai_date(strtotime($today));  ?>&nbsp; </u> <br>
        </span></br</br></br>        
        </br</br></br>
        </br</br></br>
        </br</br></br>
        </br</br></br>
        <div class="text-center">
            <b>หนังสือสัญญาเช่าอุปกรณ์ถ่ายภาพ</b></br> 
        </div>
        <span class="pull-left ">
            สัญญาฉบับนี้ทำขึ้นระหว่าง : บริษัท มะโนคาเมร่า จำกัด ชั้น12 ตึกฟรอนเทจ โรงแรมเอเชีย ราชเทวี กรุงเทพ ซึ่งต่อไปนี้ให้เรียกว่า “ผู้ให้เช่า”
        </span><br><br><br>
        <span class="pull-left ">
            ฝ่ายหนึ่ง กับ คุณ<u>&nbsp;&nbsp;  &nbsp; <?php echo $rowitem['name']; ?>&nbsp;&nbsp;  &nbsp;  &nbsp;</u> 
            เลขที่บัตรประชาชน <u>&nbsp;&nbsp;  &nbsp; <?php echo $rowitem['nationID']; ?>&nbsp;&nbsp;  &nbsp;  &nbsp;</u><br>
            ที่อยู่ปัจจุบัน บ้านเลขที่ <u>&nbsp;&nbsp;  &nbsp; <?php echo $rowitem['address']; ?>&nbsp;&nbsp;  &nbsp;  &nbsp;</u><br>
            เบอร์โทรศัพท์มือถือ <u>&nbsp;&nbsp;  &nbsp; <?php echo $rowitem['telephone']; ?>&nbsp;&nbsp;  &nbsp;  &nbsp;</u><br><br>
        </span>
        <span class="pull-left ">
            ซึ่งต่อไปนี้เรียกว่า “ผู้เช่า” อีกฝ่ายหนึ่ง ทั้งสองฝ่ายได้ตกลงทำสัญญาดังมีข้อความต่อไปนี้<br>
            ข้อ 1.ผู้เช่าได้เช่าทรัพย์สิน (อุปกรณ์ถ่ายภาพ) รายการดังนี้
        </span><br/><br/><br/><br/><br/><br/>
        <table border="1" >
            <tr>
                <th style="width: 250px" >ชื่อรุ่น </th>
                <th style="width: 100px">หมายเลขอุปกรณ์</th>
                <th style="width: 90px">ราคาเช่าต่อวัน</th>
                <th style="width: 80px">ค่าเช่าทั้งหมด</th>
                 <th style="width: 80px">วงเงินประกัน</th>
            </tr>
            <tr>

                <td><?php echo $rowitem['item_name']; ?></td>
                <td ><center><?php echo $rowitem['item_model']; ?></center></td>
                <td ><center><?php echo $rowitem['item_priceperday']; ?> บาท </center></td>
                <td ><center><?php echo $rowitem['total']; ?> บาท </center></td>
                <td ><center><?php echo $rowitem['deposit_1']; ?> บาท </center></td>
            </tr>
         </table>
        <br><br>
        <span class="pull-left ">
            ข้อ 2.ผู้เช่าตกลงชำระค่าเช่าให้แก่ผู้เช่าเป็นรายวัน ตามรายละเอียดในข้อ 1 ณ ที่ทำการผู้ให้เช่า
            กำหนดระยะเวลาเช่าเริ่มตั้งแต่วันที่<u>&nbsp;&nbsp; <?php echo thai_date(strtotime($rowitem['sdate']));  ?>&nbsp;&nbsp; </u>
            และสิ้นสุดกำหนดคืนอุปกรณ์ในวันที่<u>&nbsp;<?php echo thai_date(strtotime($rowitem['edate']));  ?>&nbsp;&nbsp; </u>
            ภายในเวลา<u>&nbsp;&nbsp; ก่อน 20.00 น.&nbsp;&nbsp;</u>น.
            ระยะเวลา<u>&nbsp;&nbsp; <?php echo $rowitem['amoutDay']; ?> วัน &nbsp;&nbsp;  </u>วัน 
            รวมเป็นเงินค่าเช่า<u>&nbsp;&nbsp; <?php echo $rowitem['total']; ?> วัน &nbsp;&nbsp;  </u>บาท

        </span><br/><br/><br/><br/><br/><br/>
        <span class="pull-right " > ลงชื่อ <u>
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; </u>ผู้เช่า<br><BR>
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;(<u>
            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  </u>)</span><br><br><br><br>
        <span class="pull-right " > 
            ข้อ 3. ผู้เช่าได้ตรวจทรัพย์สินที่เช่าแล้ว เห็นว่าทุกสิ่งอยู่ในสภาพเรียบร้อยใช้การได้อย่างสมบูรณ์จะดูแลทรัพย์สินที่เช่ามิได้ให้สูญหาย 
            และบำรุงรักษาให้อยู่ในสภาพดีอยู่เสมอพร้อมที่จะส่งมอบคืนตามสภาพเดิมทุกประการ ผู้เช่ารับรองว่า ในระหว่างที่ผู้เช่าทรัพย์สิน 
            ที่เช่าไปถ้าทรัพย์สินที่เช่าชำรุดหรือเสียหายด้วยประการใดๆ และไม่คำนึงว่าจะเป็นความผิดของผู้เช่าหรือไม่ ผู้เช่ายินดีชำระค่าปรับ 
            ไม่เกินราคารับผิดชอบของแต่ละรายการดังที่ระบุไว้ในข้อ 1 ให้แก่ผู้เช่า
        </span><br><br><br><br><br><br><br>
        <span class="pull-right " > 
        ข้อ 4. ผู้เช่าไม่มีสิทธินำทรัพย์สินที่เช่าออกให้ผู้อื่นเช่าช่วง หรือทำนิติกรรมใดๆตลอดจนทำให้ก่อและ/หรือเกิดภาระผูกพันใด ๆ กับผู้อื่น 
        เช่น นำไปจำนำ ขายฝาก ขายต่อจำหน่ายโอนด้วยประการใดๆ หรือนำไปเป็นหลักประกันและ/หรือค้ำประกันในกรณีที่ผู้เช่าฝ่าฝืนผู้เช่าตกลงเสียค่าปรับสูงสุดไม่เกิน 5 เท่าของราคาวงเงินประกันในรูปแบบที่เลือก
        และค่าเช่าตามรายการที่ระบุไว้ในข้อที่ 1 พร้อมเบี้ยปรับดังที่ระบุไว้ในข้อ 7 ตามจำนวนวันที่ผู้ให้เช่าได้รับทรัพย์สินที่ให้เช่าคืน และผู้เช่ามีสิทธิเรียกและ/หรือยึดทรัพย์สินที่เข่าคืนได้ทันทีรวมถึงมีสิทธิริบเงินค่าเช่าที่ชำระแล้วทั้งหมด และหลักประกันตามข้อ 
        </span>
        <br><br><br><br><br><br>
        <div style="border: 2px groove ; overflow: auto; width: auto; height: auto; text-align:" >
            <span > <br>
                ข้อ 5. ผู้เช่าได้นำ<u>
                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; </u>
                มามอบให้แก่ผู้เช่ายึดถือไว้เป็นประกันโดยให้ผู้เช่าจะคืนทรัพย์ที่วางประกันให้แก่ผู้เช่าก็ต่อเมื่อผู้ให้เช่าได้รับทรัพย์สินที่เช่าคืนและได้ตรวจสอบแล้วว่าถูกต้อง 
                สมบูรณ์ ครบถ้วน และ ไม่มี 
                <br><br>            </span>
        
        
        </div>
        <br><br><br><br><br>
        <span class="pull-left  " > 
        ข้อ 6. ถ้าผู้เช่าทำผิดสัญญานี้แต่ข้อหนึ่งข้อใดก็ดีผู้เช่ายอมให้ผู้ให้เช่าริบทรัพย์ตามที่วางประกันตามข้อ 5. นั้นเสีย และต้อง ชดใช้ค่าเสียหายอีกส่วนหนึ่งอีกด้วย</span>
        <br><br><br>
         <span class="pull-left  " > 
        ข้อ 7. กรณีที่ผู้เช่าไม่นำทรัพย์สินที่เช่ามาคืน ตามวันและเวลาที่ระบุไว้ในสัญญาข้อ 2 โดยไม่แจ้งผู้ให้เช่าทราบล่วงหน้า ผู้ให้เช่าสามารถปรับไม่เกินวันละ1350บาท 
        ตามจำนวนวันจนกว่าผู้ให้เช่าจะได้รับทรัพย์สินที่ให้เช่า</span><br><br><br>
        <span class="pull-left  " > 
        ข้อ 8. กรณีที่ผู้เช่าไม่สามารถนำอุปกรณ์ตามข้อที่ 1 มาคืนภายในวันเวลาที่กำหนดในข้อที่ 2 และอุปกรณ์นั้นมีการกระทำสัญญาระหว่างผู้ให้เช่ากับ ผู้เช่ารายอื่นต่อจากผู้เช่า 
        ผู้เช่ายินดีชำระค่าใช้จ่าย/ส่วนต่าง/ค่าเช่า/เบี้ยปรับ ทั้งหมด กรณีเกิดการยกเลิก เปลี่ยนแปลง อุปกรณ์จากผู้เช่ารายอื่นต่อจากผู้เช่า</span><br><br><br><br>
        <span class="pull-left  " > 
        ข้อ 9. เมื่อผู้เช่ากระทำผิดสัญญาไม่นำของมาคืนตามเวลาที่กำหนด ไม่ว่าด้วยประการใดๆผู้เช่ายินยอมให้ผู้ให้เช่าดำเนินคดีอาญาในข้อหายักยอกทรัพย์และรับผิดชอบค่าใช้จ่ายใดๆก็ตามที่เกิดขึ้น
        ระหว่างนั้นจนกว่าจะได้ข้อยุติคดี</span><br><br><br>
        <span class="pull-left  " > 
        ข้อ 10. ในกรณที่อุปกรณ์สูญหาย / ถูกขโมย ผู้เช่าต้องแจ้งให้ผู้ให้เช่าทราบภายใน 2 ชั่วโมงหลังจากสูญหาย และผู้เช่าต้องดำเนินการแจ้งความและ
        ส่งสำเนาใบแจ้งความให้ผู้ให้เช่าภายในเวลา 12 </span><br><br><br>
        ข้อ 11. กรณีคืนของก่อนวันสิ้นสุดสัญญาผู้ให้เช่าขอสงวนสิทธิ์ในการคืนเงินค่าเช่า</span><br><br>        
        <span class="pull-left  " > 
        ข้อ 12. ผู้เช่าและผู้ให้เช่า ได้อ่านและเข้าใจข้อความตามสัญญาฉบับนี้นี้ตลอดแล้วเพื่อเป็นหลักฐานจึงลงลายมือชื่อให้ไว้เป็นสำคัญ</span><br><br><br> 

        </span>
        <br/><br/><br/><br/>
        <span class="pull-left " > ลงชื่อ <u>
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; </u>ผู้ให้เช่า<br><BR>
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;(<u>พนักงานบริษัท มะโนคาเมร่า จำกัด</u>)</span>
        
        <span class="pull-right " > ลงชื่อ <u>
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; </u>ผู้เช่า<br><BR>
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;(<u>
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  </u>)</span><br><br><br><br>
        
        <br><br><br>
        <center><div style="border: 2px groove ; overflow: auto; width: 450px; height: auto; text-align: center;" >
        <span > <br>
            <b>ผู้เช่าได้รับหลักประกันคืนครบถ้วนแล้ว</b><br><br><br>
            ลงชื่อ <u>
                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; </u>ผู้เช่า<br><BR>
            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;(<u>
                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  </u>)
            <br><br></span>


    </div></center>

</body> 
</html>
