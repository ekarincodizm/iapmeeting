<html>
<head>
<title>แสดงตัวอย่างก่อนบันทึก</title>
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

		document.frm.submit();
}
</script>
</head>
<body >
<?php
// Include คลาส class.upload.php เข้ามา เพื่อจัดการรูปภาพ
//include('class.upload.php') ;
?>
<?php
//  ถ้าหากหน้านี้ถูกเรียก เพราะการ submit form  
//  ประโยคนี้จะเป็นจริงกรณีเดียวก็ด้วยการ submit form 
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

	//+ ประกาศตัวแปร 3 ตัว เพื่อเก็บชื่อของรูปภาพ เบื้องต้นให้เป็นว่างไว้ก่อน
	$reg_pic = '';


// เริ่มต้นใช้งาน class.upload.php ด้วยการสร้าง instant จากคลาส

// ภาพที่ 1
    $upload_image = new upload( $_FILES['reg_pic'] ) ;
 
    //  ถ้าหากมีภาพถูกอัปโหลดมาจริง
    if ( $upload_image->uploaded ) {
 
        // ย่อขนาดภาพให้เล็กลงหน่อย  โดยยึดขนาดภาพตามความกว้าง  ความสูงให้คำณวนอัตโนมัติ
        /* ถ้าหากไม่ต้องการย่อขนาดภาพ ก็ลบ 3 บรรทัดด้านล่างทิ้งไปได้เลย
        $upload_image->image_resize         = true ; // อนุญาติให้ย่อภาพได้
        $upload_image->image_x              = 400 ; // กำหนดความกว้างภาพเท่ากับ 400 pixel 
        $upload_image->image_ratio_y        = true; // ให้คำณวนความสูงอัตโนมัติ
 */
 
        $upload_image->process("user/fileupload"); // เก็บภาพไว้ในโฟลเดอร์ที่ต้องการ  *** โฟลเดอร์ต้องมี permission 0777
 
        // ถ้าหากว่าการจัดเก็บรูปภาพไม่มีปัญหา  เก็บชื่อภาพไว้ในตัวแปร เพื่อเอาไปเก็บในฐานข้อมูลต่อไป
        if ( $upload_image->processed ) {
 
            $reg_pic =  $upload_image->file_dst_name ; // ชื่อไฟล์หลังกระบวนการเก็บ จะอยู่ที่ file_dst_name
            $upload_image->clean(); // คืนค่าหน่วยความจำ
 
        }// END if ( $upload_image->processed )
 
    }//END if ( $upload_image->uploaded )
	


}//END if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))

//echo $reg_pic;
?>

<div align="center">
<div class="members">
<div class="memberstitle">แสดงตัวอย่างก่อนบันทึก</div>

<table width="700px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" colspan="3" height="30"><b>1. รายชื่อผู้เข้าร่วมอบรม</b></th>
  </tr>
  <tr>
    <th width="250px">คำนำหน้า :: </th>
    <td width="250px"><?php echo $_POST['reg_prefix']; ?></td>
	<td rowspan="4"><img src="register/fileupload/<?php echo $reg_pic; ?>" width="160"></td>
  </tr>
<tr>
    <th>ชื่อ :: </th>
    <td ><?php echo $_POST['reg_name']; ?></td>
	<td></td>
  </tr>
  <tr>
    <th>นามสกุล :: </th>
    <td><?php echo $_POST['reg_surname']; ?></td>
  </tr>
  <tr>
    <th>ตำแหน่ง :: </th>
    <td><?php echo $_POST['reg_position']; ?></td>
  </tr>
<tr>
    <th>เบอร์โทรศัพท์ :: </th>
    <td colspan="2"><?php echo $_POST['reg_mobile']; ?></td>
</tr>
<tr>
    <th>E-mail :: </th>
    <td colspan="2"><?php echo $_POST['reg_email']; ?></td>
</tr>
<tr>
    <td align="left" colspan="3" height="30"><b>2. ชื่อหน่วยงาน</b></th>
</tr>
<tr>
    <th>ชื่อหน่วยงาน :: </th>
    <td colspan="2"><?php echo $_POST['reg_workgroup']; ?></td>
</tr>
<tr>
    <th>ที่อยู่ :: <?php echo $_POST['district']; ?></th>
    <td colspan="2"><?php echo $_POST['reg_locationcontact']; ?></td>
</tr>
<tr>
    <th>ตำบล :: </th>
    <td colspan="3">
	<?php 
	$districtname = $_POST['district']; 
	echo $districtname;
	?>
	</td>
</tr>
<tr>
    <th>อำเภอ :: </th>
    <td colspan="3">
	<?php 
	$amphurname = $_POST['amphur']; 
	echo $amphurname;
	?>
	</td>
</tr>
<tr>
    <th>จังหวัด :: </th>
    <td colspan="3">
	<?php 
	$jangwatname = $_POST['province']; 
	echo $jangwatname;
	?>
	</td>
</tr>
<tr>
    <th>รหัสไปรษณีย์ :: </th>
    <td colspan="3"><?php echo $_POST['reg_postcode']; ?></td>
</tr>
<tr>
    <th>โทรศัพท์ที่ทำงาน :: </th>
    <td colspan="3"><?php echo $_POST['reg_teloffice']; ?></td>
</tr>
<tr>
    <th>โทรสาร :: </th>
    <td colspan="3"><?php echo $_POST['reg_fax']; ?></td>
</tr>
<tr>
    <td align="left" height="30"><b>3. ประเภทอาหารที่ต้องการ</b></td>
    <td colspan="3"><?php echo $_POST['reg_food']; ?></td>
</tr>
<tr>
    <td align="left" height="30"><b>4. ต้องการให้ออกใบเสร็จในนาม</b></td>
    <td colspan="3">
	<?php if($_POST['reg_receipt'] == "ชื่อผู้สมัคร"){
		$receiptname = $_POST['reg_prefix'].$_POST['reg_name']." ".$_POST['reg_surname'];
		echo $receiptname;
	}else{
		$receiptname = $_POST['reg_receiptname'];
		echo $receiptname;
		}
	
	 ?></td>
</tr>
<tr>
    <th>หมายเหตุ :: </th>
    <td colspan="3"><?php echo $_POST['reg_remark']; ?></td>
  </tr>
</table>



<form name="form1" ACTION="index.php?p=user/save_regis.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

<input type="hidden" name="MM_insert" value="form1" />

<INPUT TYPE="hidden" NAME="reg_prefix" VALUE="<?php echo $_POST['reg_prefix']; ?>">
<INPUT TYPE="hidden" NAME="reg_name" VALUE="<?php echo $_POST['reg_name']; ?>">
<INPUT TYPE="hidden" NAME="reg_surname" VALUE="<?php echo $_POST['reg_surname']; ?>">
<INPUT TYPE="hidden" NAME="reg_position" VALUE="<?php echo $_POST['reg_position']; ?>">
<INPUT TYPE="hidden" NAME="reg_mobile" VALUE="<?php echo $_POST['reg_mobile']; ?>">
<INPUT TYPE="hidden" NAME="reg_email" VALUE="<?php echo $_POST['reg_email']; ?>">
<INPUT TYPE="hidden" NAME="reg_workgroup" VALUE="<?php echo $_POST['reg_workgroup']; ?>">
<INPUT TYPE="hidden" NAME="reg_locationcontact" VALUE="<?php echo $_POST['reg_locationcontact']; ?>">
<INPUT TYPE="hidden" NAME="reg_jangwat" VALUE="<?php echo $jangwatname; ?>">
<INPUT TYPE="hidden" NAME="reg_amphur" VALUE="<?php echo $amphurname; ?>">
<INPUT TYPE="hidden" NAME="reg_tambon" VALUE="<?php echo $districtname; ?>">
<INPUT TYPE="hidden" NAME="reg_postcode" VALUE="<?php echo $_POST['reg_postcode']; ?>">
<INPUT TYPE="hidden" NAME="reg_teloffice" VALUE="<?php echo $_POST['reg_teloffice']; ?>">
<INPUT TYPE="hidden" NAME="reg_fax" VALUE="<?php echo $_POST['reg_fax']; ?>">

<INPUT TYPE="hidden" NAME="reg_join" VALUE="<?php echo $_POST['reg_join']; ?>">

<INPUT TYPE="hidden" NAME="reg_receiptname" VALUE="<?php echo $receiptname; ?>">

<INPUT TYPE="hidden" NAME="reg_food" VALUE="<?php echo $_POST['reg_food']; ?>">


<INPUT TYPE="hidden" NAME="reg_remark" VALUE="<?php echo $_POST['reg_remark']; ?>">
<INPUT TYPE="hidden" NAME="reg_datesave" VALUE="<?php echo date("Y-m-d"); ?>">
<INPUT TYPE="hidden" NAME="reg_th" VALUE="<?php echo $_POST['reg_th']; ?>">
<INPUT TYPE="hidden" NAME="reg_pic" VALUE="<?php echo $reg_pic; ?>">
<INPUT TYPE="hidden" NAME="reg_status" VALUE="<?php echo $_POST['reg_status']; ?>">



<div align="center">

<button type="submit" name="form1" class="btn btn-lg btn-success" OnClick="JavaScript:fncSubmit();">ส่งใบสมัคร</button>
<BR><BR>
<a href="#" onClick="javascript:window.open('','_self');window.close();">หรือคลิกที่นี่ถ้าต้องการกลับไปแก้ไขข้อมูล</a>
</FORM>
</div>

		</div>
</div>
</body>
</html>
