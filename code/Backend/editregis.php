<html>
<head>
<title>register</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="register/stype_bykorn.css" media="screen" />
</head>
<body>
<?php
$sl_sql1 = $DB->SelectSQL("SELECT * FROM regis_main 
WHERE reg_id = ".$_GET['r_id']."
ORDER BY reg_id ASC");

foreach($sl_sql1 as $rs1){}
?>
<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
			<div class="panel-heading"><h3>ใบสมัครการประชุม</h3></div>
			<div class="panel-body">
				<div class="row">
				<div class="col-md-12">
<?php

$sl_sql2 = $DB->SelectSQL("SELECT * FROM mt_bill WHERE reg_id = '".$rs1['reg_id']."' ORDER BY bill_no ASC");

// ถ้า status เท่ากับ complete ให้กำหนด Button สำหรับออกใบเสร็จ
if($rs1['reg_status'] == 'complete'){
$button_AddBill = "<a href='adm2.php?p=Backend/printbill&r_id=".$rs1['reg_id']."&r_receiptname=".$rs1['reg_receiptname']."'><button type='button' class='btn btn-lg btn-red'>ออกใบเสร็จรับเงินใหม่ ในนาม '' ".$rs1['reg_receiptname']." ''</button></a>";
}


if(count($sl_sql2) != "0"){
	foreach($sl_sql2 as $rs2){
		echo "<li><a href='adm2.php?p=Backend/printbill&r_id=".$rs1['reg_id']."&bill_no=".$rs2['bill_no']."&r_receiptname=".$rs1['reg_receiptname']." ' target='_blank'><button type='button' class='btn btn-default'>ใบเสร็จเลขที่ ".$rs2['bill_no']." ออกในนาม '' ".$rs2['bill_name']." '' ";
		if($rs2['bill_status'] == 'cancel'){echo "( ยกเลิก )";}
		echo "</button></a></li>";
	}
if($rs2['bill_status'] == 'cancel'){echo $button_AddBill;}
}else{

	echo $button_AddBill;
}

?>



<form ACTION="adm.php?p=Backend/update_regis" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="hidden" name="MM_insert" value="form1" />
<input type="hidden" name="reg_status" value="<?php echo $rs1['reg_status']; ?>" />
<input type="hidden" name="reg_id" value="<?php echo $_GET['r_id']; ?>" />

<div align="center">
<div class="members">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td align="left" colspan="4"><b>1. รายชื่อผู้เข้าร่วมอบรม</b></th>
  </tr>
 
  <tr>
    <th width="300px">คำนำหน้าชื่อ :: </th>
    <td colspan="3">
		<INPUT TYPE="text" NAME="reg_prefix" SIZE="20" VALUE="<?php echo $rs1['reg_prefix']; ?>">
	</td>
  </tr>
  <tr>
    <th>ชื่อ :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_name" SIZE="50" VALUE="<?php echo $rs1['reg_name']; ?>"></td>
  </tr>
  <tr>
    <th>นามสกุล :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_surname" SIZE="50" VALUE="<?php echo $rs1['reg_surname']; ?>"></td>
  </tr>
  <tr>
    <th>ตำแหน่ง :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_position" SIZE="50" VALUE="<?php echo $rs1['reg_position']; ?>"></td>
  </tr>
<tr>
    <th>เบอร์โทรศัพท์ :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_mobile" SIZE="20" VALUE="<?php echo $rs1['reg_mobile']; ?>"></td>
</tr>
<tr>
    <th>E-mail :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_email" SIZE="30" VALUE="<?php echo $rs1['reg_email']; ?>"></td>
</tr>
<tr>
    <th>รูปประจำตัว :: </th>
<?php if($rs1['reg_pic'] != "")
	{$regpic = $rs1[reg_pic];}
	else{$regpic = "blue-user-icon.png";} 
	?>
    <td colspan="3">
	<a href="user/fileupload/<?= $regpic ?>" class="fancybox"><img src="user/fileupload/<?= $regpic ?>" width="210px"/></a>
    <INPUT TYPE="file" NAME="reg_pic" SIZE="10">
	<INPUT TYPE="hidden" NAME="reg_picold" VALUE="<?php echo $rs1['reg_pic']; ?>">
					
	</td>
</tr>
<tr>
    <td align="left" colspan="4" height="30"><b>2. ชื่อหน่วยงาน</b></th>
</tr>
<tr>
    <th>ชื่อหน่วยงาน :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_workgroup" SIZE="50" VALUE="<?php echo $rs1['reg_workgroup']; ?>"></td>
</tr>
<tr>
    <th>ที่อยู่ :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_locationcontact" SIZE="50" VALUE="<?php echo $rs1['reg_locationcontact']; ?>"></td>
</tr>

<tr>
    <th><div align="right">ตำบล :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_tambon" SIZE="40" VALUE="<?php echo $rs1['reg_tambon']; ?>"></td>
</tr>
<tr>
    <th><div align="right">อำเภอ :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_amphur" SIZE="40" VALUE="<?php echo $rs1['reg_amphur']; ?>"></td>
</tr>
<tr>
    <th><div align="right">จังหวัด :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_jangwat" SIZE="40" VALUE="<?php echo $rs1['reg_jangwat']; ?>"></td>
</tr>

<tr>
    <th>รหัสไปรษณีย์ :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_postcode" SIZE="10" VALUE="<?php echo $rs1['reg_postcode']; ?>"></td>
</tr>
<hr>
<tr>
    <th><div align="right">โทรศัพท์ที่ทำงาน :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_teloffice" SIZE="20" VALUE="<?php echo $rs1['reg_teloffice']; ?>"></td>
<tr>
<tr>
    <th><div align="right">โทรสาร :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_fax" SIZE="20" VALUE="<?php echo $rs1['reg_fax']; ?>"></td>
</tr>
<tr>
    <td align="left" height="30"><b>3. ประเภทอาหารที่ต้องการ</b></td>
    <td colspan="3">
	<INPUT TYPE="radio" NAME="reg_food" VALUE="มังสวิรัต" <?php if($rs1['reg_food'] == "มังสวิรัต"){echo "CHECKED";}?>> มังสวิรัต
	<INPUT TYPE="radio" NAME="reg_food" VALUE="อิสลาม" <?php if($rs1['reg_food'] == "อิสลาม"){echo "CHECKED";}?>> อิสลาม
	<INPUT TYPE="radio" NAME="reg_food" VALUE="ทั่วไป" <?php if($rs1['reg_food'] == "ทั่วไป"){echo "CHECKED";}?>> ทั่วไป
	</td>
</tr>
<tr>
    <td align="left" height="30"><b>4. ต้องการให้ออกใบเสร็จในนาม</b></td>
    <td colspan="3">
	<INPUT TYPE="text" NAME="reg_receiptname" size="50" VALUE="<?php echo $rs1['reg_receiptname']; ?>">
	</td>
</tr>
<tr>
    <th><div align="right">หมายเหตุ :: </div></th>
    <td colspan="3"><TEXTAREA NAME="reg_remark" ROWS="2" COLS="30"><?php echo $rs1['reg_remark']; ?></TEXTAREA></td>
  </tr>
<tr>
    <th><div align="right">สถานะการลงทะเบียน :: </div></th>
    <td colspan="3"><?php echo chk_status($rs1['reg_status']);
	if($rs1['reg_status'] == "pay" || $rs1['reg_status'] == "complete"){
		echo "<a href='user/filepay/".$rs1['reg_pay']."' target='_blank'> <img src='../images/regis/money.png' width='60px'/> ดูหลักฐานการโอน</a> / 
		<a href=\"javascript:popup('amd2.php?p=Backend/admdel&action=Del_PicPay&r_id=".$rs1['reg_id']."','',100,100)\" onClick='return Conf(this)' title='ลบหลักฐานการโอนของ ".$rs1['reg_id']."'><IMG SRC='../images/close.png'>ลบหลักฐานการโอน</a>";
	}else{
		echo " <a href='adm.php?p=user/pay.php&r_id=".$rs1['reg_id']."'><p class='btn btn-danger'>คลิกส่งหลักฐานการชำระเงิน</p></a>";}
	
	?></td>
</tr>
<tr>
    <th><div align="right">สถานะการจ่ายเงิน :: </div></th>
    <td colspan="3">
	
	<INPUT TYPE="checkbox" NAME="reg_statuspay" VALUE="complete" <?php if($rs1['reg_status'] == "complete"){echo "CHECKED";}?>> จ่ายเงินแล้ว / ลงทะเบียนเสร็จสมบูรณ์

	</td>
</tr>
</table>

<button type="submit" name="form1" class="btn btn-lg btn-success" OnClick="JavaScript:fncSubmit();">บันทึก</button>

</div>
</div>

				</div> <!-- End col-md-6 -->
				</div> <!-- End Row -->
			</div> <!-- panel-body -->
			</div> <!-- panel panel-info -->
		</div> <!-- col-md-12 -->
	</div> <!-- row -->


</FORM>
</body>
</html>
