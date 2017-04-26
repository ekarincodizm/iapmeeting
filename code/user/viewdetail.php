<html>
<head>
<title>register save</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stype_bykorn.css" media="screen" />
<script language="JavaScript" type="text/JavaScript">
function ClearText(ControlName){
	eval("document."+ControlName+".value='';");  
}

function popUpSearch1(src) {
		var w = screen.availWidth;
		var h = screen.availHeight;
		var popW = 500, popH = 450;
		var leftPos = (w-popW)/2, topPos = (h-popH)/2;
			window.open(src, 'poppage', 'toolbars=0, scrollbars=yes, location=0, statusbars=yes, menubars=0, resizable=0, width='+popW+', height='+popH+', left ='+leftPos+', top ='+topPos);
}

function fncSubmit()
{

		document.form1.submit();
}
</script>
</head>
<body >
<?php
include("function.php");
include("dbconnect.php"); conndb();

$sql = "select * FROM regis_main 
WHERE reg_id = $_GET[reg_id]
ORDER BY reg_id ASC";
$db_query=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($db_query);

?>

<div align="center">
<div class="viewtable">

<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <th width="250"><div align="right">ชื่อ - นามสกุล :: </div></th>
    <td width="450" colspan="2"><?php echo $record[reg_name]; ?></td>
    <td width="160" rowspan="6"><img src="fileupload/<?php echo $record[reg_pic]; ?>" width="160"></td>
  </tr>
  <tr>
    <th><div align="right">ตำแหน่ง :: </div></th>
    <td colspan="2"><?php echo $record[reg_position]; ?></td>
  </tr>
<tr>
    <th><div align="right">หน่วยงาน :: </div></th>
    <td colspan="2"><?php echo $record[reg_workgroup]; ?></td>
</tr>
<tr>
    <th><div align="right">โทรศัพท์มือถือ :: </div></th>
    <td colspan="2"><?php echo $record[reg_mobile]; ?></td>
</tr>
<tr>
    <th><div align="right">E-mail :: </div></th>
    <td colspan="2"><?php echo $record[reg_email]; ?></td>
</tr>
<tr>
    <th><div align="right">สถานที่ติดต่อหน่วยงาน :: </div></th>
    <td colspan="2"><?php echo $record[reg_locationcontact]; ?></td>
</tr>
<tr>
    <th><div align="right">ตำบล :: </div></th>
    <td colspan="3"><?php echo $record[reg_tambon]; ?></td>
</tr>
<tr>
    <th><div align="right">อำเภอ :: </div></th>
    <td colspan="3"><?php echo $record[reg_amphur]; ?></td>
</tr>
<tr>
    <th><div align="right">จังหวัด :: </div></th>
    <td colspan="3"><?php echo $record[reg_jangwat]; ?></td>
</tr>
<tr>
    <th><div align="right">รหัสไปรษณีย์ :: </div></th>
    <td colspan="3"><?php echo $record[reg_postcode]; ?></td>
</tr>
<tr>
    <th><div align="right">โทรศัพท์ที่ทำงาน :: </div></th>
    <td colspan="3"><?php echo $record[reg_teloffice]; ?></td>
</tr>
<tr>
    <th><div align="right">โทรสาร :: </div></th>
    <td colspan="3"><?php echo $record[reg_fax]; ?></td>
</tr>
<tr>
    <th><div align="right">ลักษณะงานที่ปฏิบัติ :: </div></th>
    <td colspan="3"><?php echo $record[reg_otherworktype]; echo $record[reg_otherworktype]; ?></td>
</tr>
<tr>
    <th><div align="right">เข้าร่วมนำเสนอผลงานทางวิชาการ :: </div></th>
    <td colspan="3"><?php echo $record[reg_present]; ?></td>
</tr>
<tr>
    <th><div align="right">ประเภทของผลงานวิชาการ :: </div></th>
    <td colspan="3"><?php echo $record[pre_type]; ?></td>
</tr>
<tr>
    <th><div align="right">การนำเสนอผลงานทางวิชาการ :: </div></th>
    <td colspan="3"><?php echo $record[pre_process]; ?></td>
</tr>
<tr>
    <th><div align="right">ชื่อผลงานวิชาการ :: </div></th>
	<td>ภาษาไทย &nbsp;&nbsp;&nbsp; : <?php echo $record[pre_thname]; ?>
		<br><br>
		ภาษาอังกฤษ : <?php echo $record[pre_enname]; ?>
	</td>
</tr>
<tr>
    <th><div align="right">หมายเหตุ :: </div></th>
    <td colspan="3">
	<?php echo $record[reg_remark]; ?>
	</td>
  </tr>
<tr>
<tr>
    <th><div align="right">สถานะการลงทะเบียน :: </div></th>
    <td colspan="3">
<form ACTION="update_regis.php" method="post" name="form1" id="form1">
<INPUT TYPE="hidden" NAME="reg_id" VALUE="<?php echo $record[reg_id]; ?>">

	<SELECT NAME="reg_status">
		
<?php 
	$status = array("อยู่ระหว่างการตรวจสอบ","ชำระค่าลงทะเบียนแล้ว");
	$codestatus = array("r","s");

	for($i=0;$i<count($status);$i++){
		if($record[reg_status] == $codestatus[$i]){$selec = "SELECTED";}else{$selec = "";}

		echo "<OPTION VALUE='".$codestatus[$i]."' ".$selec.">".$status[$i]."</OPTION>";

	}
	
?>
	</SELECT>
	<? if($record[reg_usertype] == "in"){$check = "CHECKED";}else{$check = "";} ?>
	<INPUT TYPE="checkbox" NAME="reg_usertype" VALUE="in" <? echo $check; ?>> สังกัดกรมการแพทย์

<div align="center"><button type="button" name="form1" OnClick="JavaScript:fncSubmit();">บันทึก</button></div>


</FORM>
	</td>
  </tr>
<tr>
</table>

	</div>
		</div>
</div>
</body>
</html>
