<?php
$sql = "select * FROM mtregis_main 
WHERE reg_id = ".$_GET['r_id']."
ORDER BY reg_id ASC";
$sl_sql1 = $DB -> SelectSQL($sql);
foreach($sl_sql1 as $rs1){}
?>

<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
			<div class="panel-heading">ส่งหลักฐานการชำระเงินค่าสมัคร</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-md-12">

<form ACTION="index.php?p=user/update_pay.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="hidden" name="MM_insert" value="form1" />
<input type="hidden" name="reg_id" value="<?php echo $rs1['reg_id']; ?>" />

<table width="700px" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td height='50px'>เลขที่ใบสมัคร :</td>
	<td><?php echo $rs1['reg_id']; ?></td>
</tr>
<tr>
	<td height='50px'>ชื่อผู้สมัคร :</td>
	<td><?php echo $rs1['reg_prefix'].$rs1['reg_name']." ".$rs1['reg_surname']; ?></td>
</tr>
<tr>
	<td height='50px'>แนบไฟล์</td>
	<td><INPUT TYPE="file" NAME="reg_pay" required></td>
</tr>
</table>
<button type="submit" name="form1" class="btn btn-success">บันทึกข้อมูล</button>

</form>


				</div> <!-- End col-md-6 -->
				</div> <!-- End Row -->
			</div> <!-- panel-body -->
			</div> <!-- panel panel-info -->
		</div> <!-- col-md-12 -->
	</div> <!-- row -->