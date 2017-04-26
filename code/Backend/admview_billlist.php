<?php

$sql1 = "select * FROM mt_bill where bill_year = '2560' ORDER BY bill_no ASC";
$sl_sql1 = $DB -> SelectSQL($sql1);
$numrow = $DB->NumRows();


//echo "<a href=''><button type='button' class='btn btn-danger'>เพิ่มรายการ</button></a>";
//echo "<br><br>";

$BS->Row();
$BS->Panel("ใบเสร็จทั้งหมด ".$numrow." ใบ");
if($_GET['status'] == "all"){
echo "<div class='well'>ปีงบประมาณ ";
echoBudget($_GET['Budget']);
echo "</div>";
}

echo "<div id='Viewall'>";
$TABLE->Open();
$TABLE->TH(array("เปิด", "เลขที่ใบสมัคร", "เลขที่ใบเสร็จ", "ออกในนาม","วันที่พิมพ์","ผู้สั่งพิมพ์","สถานะใบเสร็จ"));
$TABLE->Tbody();





if(isset($sl_sql1)){
foreach($sl_sql1 as $rs1){
if($rs1[reg_pic] != ""){$pic = $rs1[reg_pic];}else{$pic = "blue-user-icon.png";}


$TABLE->TR();

$TABLE->TD("<a href='adm.php?p=Backend/editregis&r_id=".$rs1['reg_id']."'><IMG SRC='../images/zoom.png'></a>", "center");

$TABLE->TD($rs1['reg_id'], "center");
$TABLE->TD("<a href='admregis2.php?page=register/printbill.php&r_id=".$rs1['reg_id']."&bill_no=".$rs1['bill_no']."'  target='_blank'>".$rs1['bill_no']."</a>", "center");
$TABLE->TD($rs1['bill_name'], "left");
$TABLE->TD(ChangDateEN($rs1['bill_date'],"EN"), "center");
$TABLE->TD($rs1['bill_userprint'], "center");
$TABLE->TD($rs1['bill_status']);
$TABLE->TRClose();

$numrow--;
} // end foreach
} // end if
$TABLE->TbodyClose();
$TABLE->TableClose();
echo "</div>";
$TABLE->DataTable("2", "asc", "500,");
$BS->PanelClose();
$BS->RowClose();

?>