<script type="text/javascript">  

 $(function(){  
	$("#SearchPanel").hide();
	 $("#print").click(function(){    
		//alert("วางหนังสือบันทึกภายในบนเครื่องพิมพ์และกด OK");
		javascript:window.print();
	 });
    });  
</script>
<div id="bill_main">
<?php

// ----- ตรวจสอบถ้าเคยพิมพ์ใบเสร็จแล้วให้แสดงคำว่า สำเนา ถ้า cancle ให้แสดง ยกเลิก
switch ($rs1['bill_status']){
	case yes :
		echo "<div class='copy'>สำเนา</div>";
		$cancelbill = "<div class='cancelbill'><a href='adm2.php?p=Backend/printbill&cancelbill=yes&r_id=".$_GET['r_id']."&bill_no=".$_GET['bill_no']." '>
		<button type='button' class='btn btn-danger'>ยกเลิกใบเสร็จ เลขที่ ".$_GET['bill_no']."</button></a></div>";
	break;
	case cancel :
		echo "<div class='copy'>ยกเลิก</div>";
		$cancelbill = "";
	break;
}

?>


<div class="logo"><IMG SRC="../images/regis/logo_MRS3.png" width="60px" BORDER="0" ALT=""></div>
<div class="title"><B>ใบเสร็จรับเงิน</br>สมาคมเวชสถิติแห่งประเทศไทย
</br>The Medical record and Statistics Association of Thailand</B>
</br>เลขที่ ๓/๑๐๙ ซอยอินทามระ ๓๕ แขวงดินแดง เขตดินแดง กรุงเทพมหานคร ๑๐๔๐๐
</br>โทร. ๐๒-๕๒๕-๔๑๔๕ เว็บไซต์ : www.mrst.or.th</div>
<div class="no">เลขที่ &nbsp;&nbsp;<font size="20pt"><?php echo $rs1['bill_no']; ?></font></div>

<div class="date"><?php echo "วันที่ ............................... เดือน ........................................................ พ.ศ. .............................."; ?></div>
<div class="date-d"><?php echo "15"; //$d; ?></div>
<div class="date-m"><?php //echo $m;
echo "กุมภาพันธ์";
?></div>
<div class="date-y"><?php echo $y; ?></div>

<div class="namebox">ได้รับเงินจาก .............................................................................................................................</div>
<div class="name"><?php echo $rs1['bill_name']; ?></div>

<div class="tablebox">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th rowspan="2" align="center" valign="middle" scope="col">รายการ</th>
    <th colspan="2" align="center" scope="col">จำนวนเงิน</th>
  </tr>
  <tr>
    <td align="center">บาท</td>
    <td align="center">สต.</td>
  </tr>
  <tr>
    <td>- ค่าลงทะเบียน"โครงการประชุมวิชาการ</td>
    <td align="right">3,500</td>
    <td align="center">-</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;สมาคมเวชสถิติแห่งประเทศไทย ประจำปี 2560"</td>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>


  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">(สามพันห้าร้อยบาทถ้วน)</td>
    <td align="right">3,500</td>
    <td align="center">-</td>
  </tr>
</table>

</div>
<div class="recivename-label">ผู้รับเงิน
</div>
<div class="recivename">.......................................................
<br>( นางปณิตา รัชตะปิติ )
<br>เหรัญญิก
</div>
<div class="watermark">
<IMG SRC="../images/regis/logo_MRS-watermark.png"  BORDER="0" ALT="">
</div>
</div>

<?php
echo "<br>";
echo "<button type='button' value='' id='print' name='print' class='btn btn-primary' style='margin-bottom:5px;'><i class='fa fa-print'></i> สั่งพิมพ์</button>";
echo $cancelbill;
?>