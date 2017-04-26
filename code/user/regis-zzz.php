<?php
$HTML->TitlePage("ใบสมัครการประชุม");
?>
<!-- <meta http-equiv=refresh content=0;URL=register.php?page=register/viewall.php> -->

<script type="text/javascript">
	$(function () {
	//$('#reg_surname').hide();
	//alert("test");
	$('#reg_surname').change(function(){
		var pre = $('#reg_prefix').val();
		var name = $('#reg_name').val();
		var sur = $('#reg_surname').val();
		$('#showbillname').html(pre+name+" "+sur);
	})

            });
</script>	 

<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
			<div class="panel-heading"></div>
			<div class="panel-body">
				<div class="row">
				<div class="col-md-12">

<form ACTION="index.php?p=user/preview.php" target="_blank" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="hidden" name="MM_insert" value="form1" />
<INPUT TYPE="hidden" NAME="reg_status" VALUE="register">
<INPUT TYPE="hidden" NAME="reg_th" VALUE="2560">

<div align="center">
<div class="members">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td align="left" colspan="4"><b>1. รายชื่อผู้เข้าร่วมอบรม</b></th>
  </tr>
 
  <tr>
    <th width="300px">คำนำหน้าชื่อ :: </th>
    <td colspan="3">
		<INPUT TYPE="text" NAME="reg_prefix" ID="reg_prefix" SIZE="20" required>
	</td>
  </tr>
  <tr>
    <th>ชื่อ :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_name" ID="reg_name"  style="width:300px;" class="form-control"  required></td>
  </tr>
  <tr>
    <th>นามสกุล :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_surname" ID="reg_surname" SIZE="50" style="width:300px;" class="form-control" required></td>
  </tr>
  <tr>
    <th>ตำแหน่ง :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_position" ID="reg_position" SIZE="50" style="width:300px;" class="form-control" required></td>
  </tr>
<tr>
    <th>เบอร์โทรศัพท์ :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_mobile" SIZE="20" required></td>
</tr>
<tr>
    <th>E-mail :: </th>
    <td colspan="3"><INPUT type="email" NAME="reg_email" SIZE="30" required></td>
</tr>
<tr>
    <th>รูปประจำตัว :: </th>
    <td colspan="3"><INPUT TYPE="file" NAME="reg_pic" SIZE="10"></td>
</tr>
<tr>
    <td align="left" colspan="4" height="30"><b>2. ชื่อหน่วยงาน</b></th>
</tr>
<tr>
    <th>ชื่อหน่วยงาน :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_workgroup" SIZE="50" required></td>
</tr>
<tr>
    <th>ที่อยู่ :: </th>
    <td colspan="3"><TEXTAREA NAME="reg_locationcontact" ROWS="2" COLS="50"></TEXTAREA></td>
</tr>


<tr>
    <th>รหัสไปรษณีย์ :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_postcode" SIZE="10"></td>
</tr>
<hr>
<tr>
    <th>เบอร์โทรศัพท์ :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_teloffice" SIZE="20"></td>
<tr>
<tr>
    <th>โทรสาร :: </th>
    <td colspan="3"><INPUT TYPE="text" NAME="reg_fax" SIZE="20"></td>
</tr>
<tr>
    <td align="left" height="30"><b>3. ประเภทอาหารที่ต้องการ</b></td>
    <td colspan="3">
	<INPUT TYPE="radio" NAME="reg_food" VALUE="มังสวิรัต" required> มังสวิรัต
	<INPUT TYPE="radio" NAME="reg_food" VALUE="อิสลาม" required> อิสลาม
	<INPUT TYPE="radio" NAME="reg_food" VALUE="ทั่วไป" required> ทั่วไป
	</td>
</tr>
<tr>
    <td align="left" height="30"><b>4. ต้องการให้ออกใบเสร็จในนาม</b></td>
    <td colspan="3">
	<INPUT TYPE="radio" NAME="reg_receipt" VALUE="ชื่อผู้สมัคร" required> <span id="showbillname"></span>
	<br><INPUT TYPE="radio" NAME="reg_receipt" VALUE="อื่นๆ" required> อื่น ๆ ระบุ 
	<INPUT TYPE="text" NAME="reg_receiptname" size="50">
	</td>
</tr>
<tr>
    <th>หมายเหตุ :: </th>
    <td colspan="3"><TEXTAREA NAME="reg_remark" ROWS="2" COLS="50"></TEXTAREA></td>
</tr>
<tr>
<th>รหัสยืนยัน :: </th>
<td colspan="3">
<input name="codecaptcha" type="text" id="codecaptcha">
<img src="../plugin/captchastylish99/get_captcha.php" alt="" id="captcha" />
<img src="../plugin/captchastylish99/refresh.jpg" width="25" alt="" id="refresh" />
</td>
</tr>
</table>



<button type="submit" name="form1" id="Send" class="btn btn-lg btn-success" OnClick="JavaScript:fncSubmit();">แสดงตัวอย่างก่อนบันทึก</button></div> 
 <input id="submit_handle" type="submit" style="display: none">

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
