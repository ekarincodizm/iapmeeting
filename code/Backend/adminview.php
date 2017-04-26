<?php
$LimitPage = $TABLE->LimitPage($_GET['pp']);
$condition = "AND reg_status != 'cancel' and reg_th = '2560'";
$sql1 = "select * FROM regis_main where 1 ".$condition." ORDER BY reg_id DESC";
$sl_sql1 = $DB -> SelectSQL($sql1." ".$LimitPage);
$numrow = $DB->NumRows($sql1);


//echo "<a href=''><button type='button' class='btn btn-danger'>เพิ่มรายการ</button></a>";
//echo "<br><br>";

$food_Islam = $DB ->SelectSQLOne("SELECT COUNT(reg_id) AS sumfood FROM regis_main WHERE 1 ".$condition." AND reg_food = 'อิสลาม' ","sumfood");
$food_mang = $DB ->SelectSQLOne("SELECT COUNT(reg_id) AS sumfood FROM regis_main WHERE 1 ".$condition." AND reg_food = 'มังสวิรัต' ","sumfood");
$food_other = $DB ->SelectSQLOne("SELECT COUNT(reg_id) AS sumfood FROM regis_main WHERE 1 ".$condition." AND reg_food = 'ทั่วไป' ","sumfood");

$BS->Row();
$BS->Panel("รายชื่อผู้สมัครทั้งหมด ".$numrow." คน");
if($_GET['status'] == "all"){
echo "<div class='well'>ปีงบประมาณ ";
echoBudget($_GET['Budget']);
echo "</div>";
}
echo "ประเภทอาหารที่ต้องการ | ทั่วไป ".$food_other." คน | อิสลาม ".$food_Islam." คน | มังสวิรัต ".$food_mang." คน<br><br>";
$TABLE->PagePart($numrow, $_GET['pp'], $NowPath."");
echo "<div id='Viewall'>";
$TABLE->Open("", "dataTables", "table table-bordered table-hover");
$TABLE->TH(array("เปิด", "ลบ", "ลำดับที่", "เลขที่สมัคร","ใบเสร็จ","สถานะการสมัคร","ชื่อ - นามสกุล","ออกใบเสร็จในนาม","หน่วยงาน","วันที่สมัคร"));
$TABLE->Tbody();





if(isset($sl_sql1)){
$num = $numrow;
foreach($sl_sql1 as $rs1){
if($rs1[reg_pic] != ""){$pic = $rs1[reg_pic];}else{$pic = "blue-user-icon.png";}

// --- เลขที่ใบเสร็จ
$billno = $DB->SelectSQLOne("SELECT bill_no FROM mt_bill WHERE reg_id = '".$rs1['reg_id']."' ORDER BY bill_no DESC ", "bill_no");


$TABLE->TR();
$TABLE->TD("<a href=adm.php?p=Backend/editregis&r_id=".$rs1['reg_id']."><IMG SRC='../images/zoom.png'></a>", "center");

$TABLE->TD("<a href=\"javascript:popup('admregis2.php?page=register/admdel&action=Del_regis&r_id=".$rs1['reg_id']."','',100,100)\" onClick='return Conf(this)' title='ลบ ".$rs1[reg_id]."'><IMG SRC='../images/close.png'></a>", "center");

$TABLE->TD($num, "center");
$TABLE->TD($rs1['reg_id'], "center");
$TABLE->TD("<a href='admregis2.php?page=register/printbill&r_id=".$rs1['reg_id']."&bill_no=".$billno."'  target='_blank'>".$billno."</a>", "center");
$TABLE->TD("<a href='admregis.php?page=editregis&r_id=".$rs1['reg_id']."'>".chk_status($rs1['reg_status'])."</a>", "center");
$TABLE->TD("<a class='fancybox' href='user/fileupload/".$pic."'><img src='user/fileupload/".$pic."' width='30px'></a> ".$rs1[reg_prefix]."".$rs1[reg_name]." ".$rs1[reg_surname]."");
$TABLE->TD($rs1['reg_receiptname']);
$TABLE->TD($rs1['reg_workgroup']);
$TABLE->TD(ChangDateEN($rs1['reg_datesave'],"EN"), "center");
$TABLE->TRClose();

$num--;
} // end foreach
} // end if
$TABLE->TbodyClose();
$TABLE->TableClose();
echo "</div>";
$PHP->IncOne($TABLE->datatablescript);
$TABLE->DataTable("3", "desc", "500,");
$TABLE->PagePart($numrow, $_GET['pp'], $NowPath."");
$BS->PanelClose();
$BS->RowClose();

?>