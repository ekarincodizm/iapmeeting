<?php  
/*$sql1 = "
		SELECT * FROM sb_main
		WHERE sb_id = '".$_GET['sbid']."'
		";
$sl_sql1 = $DB->SelectSQL($sql1);
if($sl_sql1){ // ถ้ามีข้อมูลให้แสดง
foreach($sl_sql1 as $rs1){
} // End Foreach
} // End IF
*/
$HTML->TitlePage("Register Form");
//$HTML->BackButton();
$BS->Well("col-sm-12 col-md-12 col-lg-12");

$FORM->Open($HTML->UserPath."QuerySQL","formID", "");
$FORM->Hidden("action","AddRegis");

$FORM->Section("1. Profile");
$FORM->TextBoxSearch("Name (ชื่อ)", "reg_name", $rs1['reg_name'], "validate[required] text-input");
$FORM->TextBoxSearch("Surname (นามสกุล)", "reg_surname", $rs1['reg_surname'], "validate[required] text-input");
$FORM->TextBox("Position (ตำแหน่ง)","reg_position",$rs1['reg_position']);
$FORM->TextBox("Telephone (เบอร์โทรศัพท์)","reg_mobile",$rs1['reg_mobile'],"","validate[required] text-input");
$FORM->TextMail("E-mail (อีเมลล์)","reg_email",$rs1['reg_email'],"","validate[required] text-input");
$FORM->TextBox("Password (พาสเวิร์ด)","reg_pass",$rs1['reg_pass'],"","validate[required] text-input");
/*
$BS->line();
$FORM->RadioButton("ประเภท","sb_case",array('Surgical','Cyto'),array('Surgical','Cyto') ,$val);

echo "<div id='box_sur_type'>";
$FORM->CheckBox("ต้องการขอ","sb_type",array('สไลด์','พาราฟินบล็อก','สำเนาผลการรักษา'),array('slide','block','copy') ,$rs1['sb_type']);
echo "</div>";
echo "<div id='box_cyto_type'>";
$FORM->CheckBox("ต้องการขอ","sb_type",array('สไลด์ระบบอวัยวะสืบพันธุ์สตรี','สไลด์ระบบอื่นๆ','สำเนาผลการรักษา'),array('PN','FN','copy') ,$rs1['sb_type']);
echo "</div>";


$BS->line();
$FORM->RadioButton("เพื่อ","sb_for",array('ไปประกอบการรักษาพยาบาล','ส่งรักษาต่อ','อื่นๆ'),array('ไปประกอบการรักษาพยาบาล','ส่งรักษาต่อ','อื่นๆ') ,$rs1['sb_for']);
echo "<div id='box_refer'>";
$FORM->TextBoxSearch("", "sb_referhospital", $rs1['sb_referhospital'], "validate[required] text-input", "BoxSearch", "", "โปรดระบุโรงพยาบาลที่ส่งรักษาต่อ");
;
echo "</div>";
echo "<div id='box_remark'>";
$FORM->TextArea("","sb_remark", "", "", "", "validate[required] text-input", "อื่น ๆ โปรดระบุ");
echo "</div>";

$BS->line();
$FORM->TextBox("ชื่อผู้ป่วย","sb_patient",$rs1['sb_patient'],"","validate[required] text-input");
$FORM->TextBox("เลขที่สไลด์/พาราฟินบล็อก ( SN / PN / FN )","sb_SN",$rs1['sb_SN'],"","validate[required] text-input");
//$FORM->TextBox("เลขที่ภายนอก (H.N.)","sb_HN");

$BS->line();

$FORM->RadioButton("ช่องทางการรับ","sb_sendtype",array('ส่งไปรษณีย์','ผู้ป่วย/ญาติ/เจ้าหน้าที่ มารับเอง'),array('post','walkin') ,$rs1['sb_sendtype']);
echo "<div id='box_walkin'>";
$FORM->TextBoxDate("วันที่ต้องการมารับ","sb_wantdate", "", "", "", "datepicker-en", "");

echo "</div>";

$FORM->Hidden("sb_status","register");

*/
$FORM->Captcha("Captcha");
$FORM->Submit("Submit ".$_GET['type'] ,"","Send","captcha");
$FORM->Close();

$BS->WellClose();

?>