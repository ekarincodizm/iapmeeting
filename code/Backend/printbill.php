<?php

// 1. ถ้ายังไม่มีเลขที่ใบเสร็จ เริ่มสร้างใบเสร็จใหม่
if($_GET['bill_no'] == ""){

	// ----- หาเลขที่ใบเสร็จสุดท้าย
	$last_billno = $DB->SelectSQLOne("SELECT bill_no FROM mt_bill WHERE 1 AND bill_year = '".$year."' ORDER BY bill_id DESC ", "bill_no");
	// + เพิ่มอีก 1
	$next_billno = $last_billno+1;

			$sql = "
			INSERT INTO mt_bill 
				( 
				reg_id,
				bill_no,
				bill_year, 
				bill_name, 
				bill_date,
				bill_userprint
				)
				VALUES
				(
				'".$_GET['r_id']."', 
				'".$next_billno."', 
				'".$year."',
				'".$_GET['r_receiptname']."', 
				'".$Nowdate."',
				'".$user->name."'
				);
				";
			$result = $DB->QuerySQL($sql);
			//echo $sql;
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=admregis2.php?page=register/printbill.php&r_id=".$_GET['r_id']."&bill_no=".$next_billno." '>";
}else{
// 2. ถ้ามีเลขที่ใบเสร็จแล้ว แสดงข้อมูลใบเสร็จ

	// ในกรณีที่สั่งยกเลิกใบเสร็จ
	if($_GET['cancelbill'] == 'yes'){
		$sql = "UPDATE  mt_bill 	SET bill_status = 'cancel' , bill_canceldate = '".$Nowdate."' , bill_cancelby = '".$user->name."' WHERE reg_id = '".$_GET['r_id']."' AND bill_no = '".$_GET['bill_no']."' ";
		$result = $DB->QuerySQL($sql); echo "ยกเลิกใบเสร็จเรียบร้อย";
	}

	// เริ่มแสดงข้อมูล
	$sl_sql1 = $DB->SelectSQL("SELECT * FROM mt_bill WHERE reg_id = '".$_GET['r_id']."' AND bill_no = '".$_GET['bill_no']."' and bill_status != 'cancle' order by bill_no DESC LIMIT 1");

	foreach($sl_sql1 as $rs1){}

	$datebill =explode ("-",$rs1['bill_date']);
	$d = $datebill['2'];
	$m = ShowMonth($rs1['bill_date']);
	$y =  $datebill[0]+543;	

}

include "Backend/showbill.php";

		// ถ้า status ยังเป็นค่าว่าง ให้เติม yes เพื่อให้รู้ว่าสั่งปริ้นแล้ว
		if($rs1['bill_status'] == ""){
		$sql = "UPDATE  mt_bill 	SET bill_status = 'yes' WHERE bill_no = '".$_GET['bill_no']."' ";
		$result = $DB->QuerySQL($sql);
		}

?>