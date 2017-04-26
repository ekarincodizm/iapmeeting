<html>
<head>
<title>register save</title>
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

		document.frm.submit();
}
</script>
</head>
<body >
<?php

$sl_sql1 = $DB->SelectSQL("select * FROM mtregis_main
WHERE reg_name = '".$_GET['reg_name']."' 
and reg_surname = '".$_GET['reg_surname']."'
order by reg_id DESC LIMIT 1");

	foreach($sl_sql1 as $rs1){}

?>
<div align="center">
<div class="print">
ข้อมูล
<?php echo $rs1['reg_prefix'].$rs1['reg_name']." ".$rs1['reg_surname']?>
 บันทึกเสร็จสมบูรณ์
</br>
<h2>เลขที่ใบสมัครของคุณคือ <?php echo $rs1['reg_id']?></h2>
</br>กรุณาพิมพ์ หรือจดเลขที่ใบสมัครไว้เป็นหลักฐานการลงทะเบียนในวันงาน
</div></div>

<div class="printdetail">
<B>การชำระเงินค่าสมัคร</B>
-	ชำระเงินภายในวันที่ 31 มกราคม 2560 จำนวน 3,500 บาท (สามพันห้าร้อยบาทถ้วน)
</br>
โดยโอนเข้าบัญชี ออมทรัพย์ ธนาคารไทยพาณิชย์ สาขาโรงพยาบาลราชวิถี
</br>
ชื่อบัญชีสมาคมเวชสถิติแห่งประเทศไทย 051-257592-3 
</br>
-	ส่งหลักฐานการชำระเงินค่าสมัครมาที่ Fax : 02- 3548159
</br>
หรือ ส่งออนไลน์ที่เว็บ www.mrst.or.th <a href="register/download/how-to-pay-online.pdf" target="_blank">คลิกที่นี่เพื่อดูวิธีส่งออนไลน์</a>
</br>
<B>ผู้ประสานงานอบรม</B>
</br>
- (รับสมัครอบรม) คุณหัสดี กระตุฤกษ์ โทร : 081-2862786</br>
- (การเงิน) คุณปณิตา รัชตะปิติ โทร : 081-6965068
<br>
(ส่งผลงานนำเสนอทางวิชาการ) อ.นพมาศ เครือสุวรรณ โทร : 088-8580980
</div>
<div align="center"><button name="print" type="submit" id="print" value="Print" onClick="window.print()" class="btn btn-lg btn-success"/>พิมพ์</button>
<a href="index.php?p=user/viewall.php"><button class="btn btn-lg btn-info"/>ดูรายชื่อผู้สมัครทั้งหมด</button></a>
</div>
</body>
</html>
