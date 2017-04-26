<html>
<head>
<title>register</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="register/stype_bykorn.css" media="screen" />
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
<body>

<?php
if($_GET[regis_mobile] != ""){ // ถ้ามาจากหน้าสมัครสมาชิกอัตโนมัติ

	$andregmobile = "reg_name LIKE '%".$_GET["regis_name"]."%' AND reg_mobile = '$_GET[regis_mobile]'";
}else{
	
	$andregmobile = "reg_name LIKE '%".$_POST["reg_name"]."%' AND reg_mobile = '$_POST[reg_mobile]'";
}

$sql = "select * FROM regis_main
WHERE 
$andregmobile
and reg_mobile != ''

ORDER BY reg_id DESC
";
//echo $sql;

$db_query=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($db_query);

//echo $sql;
//echo $record[reg_id];

if($record[reg_id] != ""){

?>

<form ACTION="register/save_regis.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

<INPUT TYPE="hidden" NAME="reg_name" VALUE="<?php echo $record[reg_name]; ?>">
<INPUT TYPE="hidden" NAME="reg_mobile" VALUE="<?php echo $record[reg_mobile]; ?>">
<INPUT TYPE="hidden" NAME="reg_id" VALUE="<?php echo $record[reg_id]; ?>">
<INPUT TYPE="hidden" NAME="savepresent" VALUE="yes">

<div align="center">
<div class="members">
<div class="memberstitle">แบบฟอร์มการนำเสนอผลงานทางวิชาการ</div>
<table width="900" border="0" cellspacing="0" cellpadding="0">


  <tr>
    <th>ชื่อ - นามสกุล :: </th>
    <td colspan="3"><?php echo $record[reg_name]; ?></td>
  </tr>
  <tr>
    <th>ตำแหน่ง :: </th>
    <td colspan="3"><?php echo $record[reg_position]; ?></td>
  </tr>
<tr>
    <th>หน่วยงาน :: </th>
    <td colspan="3"><?php echo $record[reg_workgroup]; ?></td>
</tr>
<tr>
    <th>โทรศัพท์มือถือ :: </th>
    <td colspan="3"><?php echo $record[reg_mobile]; ?></td>
</tr>
<tr>
    <th>E-mail :: </th>
    <td colspan="3"><?php echo $record[reg_email]; ?></td>
</tr>
<tr>
    <th>สถานที่ติดต่อหน่วยงาน :: </th>
    <td colspan="3"><?php echo $record[reg_locationcontact]; ?></td>
</tr>
<tr>
    <th>ตำบล :: </th>
    <td colspan="3"><?php echo $record[reg_tambon]; ?></td>
</tr>
<tr>
    <th >อำเภอ :: </th>
    <td colspan="3"><?php echo $record[reg_amphur]; ?></td>
</tr>
<tr>
    <th>จังหวัด :: </th>
    <td colspan="3"><?php echo $record[reg_jangwat]; ?></td>
</tr>
<tr>
    <th>รหัสไปรษณีย์ :: </th>
    <td colspan="3"><?php echo $record[reg_postcode]; ?></td>
</tr>
<tr>
    <th>โทรศัพท์ที่ทำงาน :: </th>
    <td colspan="3"><?php echo $record[reg_teloffice]; ?></td>
</tr>
<tr>
    <th>โทรสาร :: </th>
    <td colspan="3"><?php echo $record[reg_fax]; ?></td>
</tr>
<tr>
    <th>ประเภทของผลงานวิชาการ :: </th>
    <td colspan="3">
		<INPUT TYPE="radio" NAME="pre_type" value="โครงการวิจัย"> โครงการวิจัย
		<INPUT TYPE="radio" NAME="pre_type" value="นวัตกรรม" > นวัตกรรม	
	</td>
</tr>
<tr>
    <th>การนำเสนอผลงานทางวิชาการ :: </th>
    <td colspan="3">
		<INPUT TYPE="radio" NAME="pre_process" value="Poster presentation" <? if($record[pre_process] == "Poster presentation"){echo "CHECKED";} ?>> Poster presentation
		<br>
		<INPUT TYPE="radio" NAME="pre_process" VALUE="Oral presentation" <? if($record[pre_process] == "Oral presentation"){echo "CHECKED";} ?>> Oral presentation
	</td>
</tr>
<tr>
    <th>ชื่อผลงานวิชาการ :: </th>
    <td colspan="3">
		ภาษาไทย &nbsp;&nbsp;&nbsp; : <INPUT TYPE="text" NAME="pre_thname" SIZE="60">
		<br><br>
		ภาษาอังกฤษ : <INPUT TYPE="text" NAME="pre_enname" SIZE="60">
	</td>
</tr>
</table>

<div align="center"><button type="button" name="form1" OnClick="JavaScript:fncSubmit();">ส่งแบบฟอร์มการนำเสนอผลงาน</button>
<button type="button" name="form1" OnClick="JavaScript:fncSubmit();">ต้องการส่งภายหลัง</button>
</div>

</div>


</FORM>

<? }else{ 



	?>


<FORM METHOD=POST ACTION="#">
 
<div align="center">

	<div class="members">
<div class="memberstitle">แบบฟอร์มการนำเสนอผลงาน</div>
<span class="noti">*** ต้องทำการสมัครเข้าร่วมการอบรมก่อน ถึงจะสามารถกรอกแบบฟอร์มการนำเสนอผลงานได้ ถ้ายังไม่ได้สมัครเข้าร่วมการอบรม </span><a href="index2.php?page=regis">คลิกที่นี่</a>

<table width="600" border="0" cellspacing="0" cellpadding="0">

<tr>
    <th>ชื่อ หรือ นามสกุล :: </th>
    <td colspan="3">
	<INPUT TYPE="text" NAME="reg_name" SIZE="20" VALUE="<? echo $_POST[reg_name]; ?>"> <span class="noti">**ต้องตรงกับที่กรอกในใบสมัคร</span>
	</td>
</tr>
<tr>
    <th>ใส่เบอร์โทรศัพท์มือถือ :: </th>
    <td colspan="3">
	<INPUT TYPE="text" NAME="reg_mobile" SIZE="20" VALUE="<? echo $_POST[reg_mobile]; ?>">  <span class="noti">**ต้องตรงกับที่กรอกในใบสมัคร</span>
	</td>
</tr>

</table>
<?php 
	
// ตรวจสอบส
if($_GET["regis_name"] == ""){
	if($record[reg_name] != $_POST[reg_name] or $record[reg_mobile] != $_POST[reg_mobile]){
	echo " <span class='noti'>ข้อมูลไม่ตรงกับใบสมัครของคุณ</span>";}	
}
?>
<div align="center"><button type="submit" name="form1" id="b1" size="30" OnClick="JavaScript:fncSubmit();">เข้าสู่แบบฟอร์มการนำเสนอผลงาน</button></div>
	</div>
</div>

<span class="noti">*** หากพบปัญหาในการใช้งานกรุณาติดต่อ webmaster@iop.or.th</span>
</FORM>

<? } ?>
<img src="images/present.jpg">
</body>
</html>
