<title>พิมพ์รายชื่อ</title>
<?php
$user =& JFactory::getUser(); // GetUser

$sql1 = "select * FROM mtregis_main where reg_status != 'cancel' and reg_th = '2560' ORDER BY reg_workgroup ASC";
$sl_sql1 = $DB -> SelectSQL($sql1);
$numrow = $DB->NumRows();


//echo "<a href=''><button type='button' class='btn btn-danger'>เพิ่มรายการ</button></a>";
//echo "<br><br>";

$BS->Row();

if($_GET['status'] == "all"){
echo "<div class='well'>ปีงบประมาณ ";
echoBudget($_GET['Budget']);
echo "</div>";
}

echo "<div id='Viewall'>";
echo "<H4 align='center'>โครงการประชุมวิชาการสมาคมเวชสถิติแห่งประเทศไทย
<br>
ณ โรงแรมเอเชีย ราชเทวี กรุงเทพฯ วันที่ 15 - 17 กุมภาพันธ์ 2560
</div>
";
$TB->Open("","dataTables");
$TB->TH(array("ลำดับที่", "เลขที่สมัคร","เลขที่ใบเสร็จ","ชื่อ - นามสกุล","ออกใบเสร็จในนาม","หน่วยงาน","สถานะ"));
$TB->Tbody();





if(isset($sl_sql1)){
$i = 1;
foreach($sl_sql1 as $rs1){
if($rs1[reg_pic] != ""){$pic = $rs1[reg_pic];}else{$pic = "blue-user-icon.png";}


$TB->TR();

$TB->TD($i, "center");
$TB->TD($rs1['reg_id'], "center");
$TB->TD($DB->SelectSQLOne("SELECT bill_no FROM mt_bill WHERE reg_id = '".$rs1['reg_id']."' ORDER BY bill_no DESC ", "bill_no"), "center");
//$TB->TD("<a href='admregis.php?page=editregis&r_id=".$rs1['reg_id']."'>".chk_status($rs1['reg_status'])."</a>", "center");
$TB->TD($rs1[reg_prefix]."".$rs1[reg_name]." ".$rs1[reg_surname]."");
$TB->TD($rs1['reg_receiptname'], "left");
$TB->TD($rs1['reg_workgroup'], "left");
$TB->TD(chk_statusPrint($rs1['reg_status']), "center");

$TB->TRClose();

$i++;
} // end foreach

$TB->TRClose();

} // end if
$TB->TbodyClose();
$TB->TableClose();
echo "</div>";
$TB->DataTable("1", "asc", "500,");
$BS->RowClose();

?>