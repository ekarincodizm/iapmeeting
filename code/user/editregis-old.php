<html>
<head>
<title>register</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="register/stype_bykorn.css" media="screen" />
</head>
<body>

<?php
$sql = "select * FROM mtregis_main 
WHERE reg_id = ".$_GET['r_id']."
ORDER BY reg_id ASC";
$db_query=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($db_query);

?>
<form ACTION="admregis2.php?page=register/update_regis.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="hidden" name="MM_insert" value="form1" />
<input type="hidden" name="reg_status" value="<?php echo $record['reg_status']; ?>" />
<input type="hidden" name="reg_id" value="<?php echo $_GET['r_id']; ?>" />

<div align="center">
<div class="viewtable">

<table width="600" border="0" cellspacing="0" cellpadding="0">


  <tr>
    <th width="220px"><img src="register/fileupload/<?php if($record[reg_pic] != ""){echo $record[reg_pic];}else{echo "blue-user-icon.png";} ?>" width="210px"/></div></th>
    <td colspan="3"><INPUT TYPE="file" NAME="reg_pic" SIZE="10">
					<INPUT TYPE="hidden" NAME="reg_picold" VALUE="<?php echo $record['reg_pic']; ?>">
	
  </tr>
  <tr>
    <td align="left" colspan="4" height="30"><b>1. รายชื่อผู้เข้าร่วมอบรม</b></th>
  </tr>
  <tr>
    <th><div align="right">คำนำหน้าชื่อ :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_prefix" SIZE="40" VALUE="<?php echo $record['reg_prefix']; ?>"></td>
  </tr>
  <tr>
    <th><div align="right">ชื่อ :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_name" SIZE="40" VALUE="<?php echo $record[reg_name]; ?>"></td>
  </tr>
  <tr>
    <th><div align="right">นามสกุล :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_surname" SIZE="40" VALUE="<?php echo $record['reg_surname']; ?>"></td>
  </tr>

<tr>
    <th><div align="right">เบอร์โทรศัพท์ :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_mobile" SIZE="20" VALUE="<?php echo $record[reg_mobile]; ?>"></td>
</tr>
<tr>
    <th><div align="right">E-mail :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_email" SIZE="40" VALUE="<?php echo $record[reg_email]; ?>"></td>
</tr>
<tr>
    <td align="left" colspan="4" height="30"><b>2. ชื่อหน่วยงาน</b></th>
</tr>
<tr>
    <th><div align="right">ชื่อหน่วยงาน :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_workgroup" SIZE="40" VALUE="<?php echo $record[reg_workgroup]; ?>"></td>
</tr>
<tr>
    <th><div align="right">ที่อยู่ :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_locationcontact" SIZE="40" VALUE="<?php echo $record[reg_locationcontact]; ?>"></td>
</tr>
<tr>
    <th><div align="right">ตำบล :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_tambon" SIZE="40" VALUE="<?php echo $record[reg_tambon]; ?>"></td>
</tr>
<tr>
    <th><div align="right">อำเภอ :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_amphur" SIZE="40" VALUE="<?php echo $record[reg_amphur]; ?>"></td>
</tr>
<tr>
    <th><div align="right">จังหวัด :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_jangwat" SIZE="40" VALUE="<?php echo $record[reg_jangwat]; ?>"></td>
</tr>
<tr>
    <th><div align="right">รหัสไปรษณีย์ :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_postcode" SIZE="10" VALUE="<?php echo $record[reg_postcode]; ?>"></td>
</tr>
<tr>
    <th><div align="right">โทรศัพท์ที่ทำงาน :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_teloffice" SIZE="20" VALUE="<?php echo $record[reg_teloffice]; ?>"></td>
<tr>
<tr>
    <th><div align="right">โทรสาร :: </div></th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_fax" SIZE="20" VALUE="<?php echo $record[reg_fax]; ?>"></td>
</tr>
<tr>
    <td align="left" height="30"><b>3. ประเภทอาหารที่ต้องการ</b></td>
    <td colspan="3">
	<INPUT TYPE="radio" NAME="reg_food" VALUE="มังสวิรัต" <?php if($record['reg_food'] == "มังสวิรัต"){echo "CHECKED";}?>> มังสวิรัต
	<INPUT TYPE="radio" NAME="reg_food" VALUE="อิสลาม" <?php if($record['reg_food'] == "อิสลาม"){echo "CHECKED";}?>> อิสลาม
	<INPUT TYPE="radio" NAME="reg_food" VALUE="ทั่วไป" <?php if($record['reg_food'] == "ทั่วไป"){echo "CHECKED";}?>> ทั่วไป
	</td>
</tr>
<tr>
    <td align="left" height="30"><b>4. ต้องการให้ออกใบเสร็จในนาม</b></td>
    <td colspan="3">
	<INPUT TYPE="text" NAME="reg_receiptname" size="50" VALUE="<?php echo $record['reg_receiptname']; ?>">
	</td>
</tr>
<tr>
    <th><div align="right">หมายเหตุ :: </div></th>
    <td colspan="3"><TEXTAREA NAME="reg_remark" ROWS="2" COLS="30"><?php echo $record[reg_remark]; ?></TEXTAREA></td>
  </tr>
<tr>
    <th><div align="right">สถานะการลงทะเบียน :: </div></th>
    <td colspan="3"><?php echo chk_status($record['reg_status']);
	if($record['reg_status'] != "register"){echo "<a href='register/filepay/".$record['reg_pay']."' target='_blank'><img src='register/images/money.png' width='60px'/></a>";}
	
	?></td>
</tr>
  <tr>
    <th><div align="right">สถานะการจ่ายเงิน :: </div></th>
    <td colspan="3">
	
	<INPUT TYPE="checkbox" NAME="reg_statuspay" VALUE="complete" <?php if($record['reg_status'] == "complete"){echo "CHECKED";}?>> จ่ายเงินแล้ว / ลงทะเบียนเสร็จสมบูรณ์

	</td>
  </tr>
</table>
<div align="right"><button type="submit" name="form1" OnClick="JavaScript:fncSubmit();">บันทึก</button></div>

</div>




</FORM>
</body>
</html>
