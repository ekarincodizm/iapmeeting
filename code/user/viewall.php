<?php
$HTML->TitlePage("All List of register");
$sql1 = "select * FROM regis_main where reg_status != 'c' 
AND reg_th = '2560' AND reg_status != 'cancel'
ORDER BY reg_id DESC LIMIT 50";

$sl_sql1 = $DB -> SelectSQL($sql1);
$numrow = $DB->NumRows();

$BS->Row();
$BS->Panel("register ".$numrow." people");
if($_GET['status'] == "all"){
echo "<div class='well'>ปีงบประมาณ ";
echoBudget($_GET['Budget']);
echo "</div>";
}
echo "<div id='Viewall'>";
$TABLE->Open();
$TABLE->TH(array("order", "regis no","name","bill name","regis date","status"));
$TABLE->Tbody();

if(isset($sl_sql1)){
foreach($sl_sql1 as $rs1){
if($rs1[reg_pic] != ""){$pic = $rs1[reg_pic];}else{$pic = "blue-user-icon.png";}

// --- เลขที่ใบเสร็จ
$billno = $DB->SelectSQLOne("SELECT bill_no FROM mt_bill WHERE reg_id = '".$rs1['reg_id']."' ORDER BY bill_no DESC ", "bill_no");

$TABLE->TR();
$TABLE->TD($numrow, "center");
$TABLE->TD($rs1['reg_id'], "center");
$TABLE->TD("<a class='fancybox' href='user/fileupload/".$pic."'><img src='user/fileupload/".$pic."' width='30px'></a> ".$rs1[reg_prefix]."".$rs1[reg_name]." ".$rs1[reg_surname]."");
$TABLE->TD($rs1['reg_receiptname']);
$TABLE->TD(ChangDateEN($rs1['reg_datesave'],"EN"), "center");
$TABLE->TD(chk_statususer($rs1['reg_status'], $rs1['reg_id']), "center");
$TABLE->TRClose();

$numrow--;
} // end foreach
} // end if

$TABLE->TbodyClose();
$TABLE->TableClose();
echo "</div>";
$PHP->IncOne($TABLE->datatablescript);
$TABLE->DataTable("1", "desc", "500,");
$BS->PanelClose();
$BS->RowClose();

?>