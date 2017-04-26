<?php
include_once("../config.inc.php");
class TABLE extends ConfigSystem
{
	public function Open($width="", $id="dataTables-example",$class="table table-striped table-bordered table-hover")
	{
		echo "<table width='".$width."' id='".$id."' class='".$class."' border='1'>";
	}
	public function TH($name)
	{
		echo "<thead><tr>";
			foreach($name as $th){echo "<th>".$th."</th>";}
		echo "</tr></thead>";
	}
	public function Tbody()
	{
		echo "<tbody>";
	}
	public function TD($data,$align="left",$class="")
	{
		echo "<td align='".$align."' class='".$class."'>".$data."</td>";
	}
	public function TR()
	{
		echo "<tr>";
	}
	public function TRClose()
	{
		echo "</tr>";
	}
	public function TbodyClose()
	{
		echo "</tbody>";
	}
	public function TableClose()
	{
		echo "</table>";
	}
	public function ButtonAddFixed($URL, $ID, $Name="แจ้งซ่อม", $title, $id="",  $class="btn btn-outline btn-info btn-xs")
	{
		return 
		"
			<a href='".$this->BackendPath2.$URL."&asID=".$ID."' title='".$title."'  id='".$id."' class='".$class."'>
			<i class='fa fa-pencil-square-o'>".$Name."</i>
			</a>
		";
	}
	public function ButtonUpdate($URL, $EditID, $Status, $Loca, $Name, $title, $class="various iframe btn btn-outline btn-info btn-xs")
	{
		return 
		"
			<a		href='".$this->BackendPath2.$URL."&editid=".$EditID."&fstatus=".$Status."&Loca=".$Loca."' id='edit' title='".$title."' class='".$class."'>
			<i class='fa fa-check-square-o'>".$Name."</i>
			</a>
		";
	}
	public function ButtonEdit($URL, $EditID, $title, $id="",  $class="btn btn-outline btn-success btn-xs")
	{
		return 
		"
			<a href='".$this->UserPath2.$URL."&editid=".$EditID."' title='".$title."'  id='".$id."' class='".$class."'>
			<i class='fa fa-search'>เปิด</i>
			</a>
		";
	}
	public function ButtonDel($ActionLink, $DelID, $title, $class="deleteItem btn btn-outline btn-danger btn-xs", $Name="ลบ")
	{
		return 
		"
			<a href='#' ActionLink='".$ActionLink."' DelID='".$DelID."' title='".$title."' class='".$class."' >
			<i class='fa fa-times'>".$Name."</i>
			</a>
		";
	}
	public function DataTable($OrderRow=0, $tyle="DESC" ,$choice="50, 100,")
	{
		echo
		"
		<script>
			$(document).ready(function() {
			$('#dataTables-example').dataTable( {
			\"lengthMenu\": [[".$choice." -1], [".$choice." \"ทั้งหมด\"]],
			\"order\": [[".$OrderRow." , \"".$tyle."\" ]]
			} );
			} );
		</script>
		";
	}
	public function PagePart($num_rows, $current_page, $gotopage, $page_size="50")
	{
	if(!isset($current_page)){$current_page="1";}

	echo "<div class='ButtonGroup' >";

	$num_pages = ceil($num_rows/$page_size);
	$group_size = 10; // จำนวนกลุ่มของหน้าทั้งหมด
	$current_group = ceil($current_page/$group_size);

	echo "ทั้งหมด&nbsp;".$num_rows."&nbsp;รายการ&nbsp;&nbsp;";
	echo "|&nbsp;&nbsp;".$current_page."/".$num_pages." หน้า";
	echo "&nbsp;&nbsp;&nbsp&nbsp;";

	if($current_group > 1){
	// กลุ่มหมายเลขเพจและลิงค์ Previous
	$last_page_of_last_group = ($current_group - 1) * $group_size;
	echo "<a href=".$gotopage."&pp=1 \" class='btn btn-outline btn-default btn-xs'><i class='fa fa-angle-double-left'></i></a> \n";
	
	echo "<a href=\"".$gotopage."&pp=$last_page_of_last_group\" class='btn btn-outline btn-default btn-xs'><i class='fa fa-angle-left'></i></a>";
	}

	$first_page_of_current_group = (($current_group - 1) * $group_size) + 1;
	$last_page_of_current_group = $current_group * $group_size;

	if($last_page_of_current_group <= $num_pages){
	$end = $last_page_of_current_group;
	}
	else{
	$end = $num_pages;
	}
	for($i = $first_page_of_current_group; $i <= $end; $i++){
	// หมายเลขของหน้าปัจจุบันไม่ต้องทำลิงค์
	if($i == $current_page){
	echo "&nbsp;<div class='btn btn-info'>";
	echo " ".$i." ";
	echo "</div>";}
	else{

	echo "&nbsp;<a href=\"".$gotopage."&pp=$i\" class='btn btn-outline btn-default btn-xs'>". "$i" ."</a>";

	}
	}
	if($num_pages > $last_page_of_current_group){

	// กลุ่มหมายเลขเพจและลิงค์ Next
	$first_page_of_next_group = $last_page_of_current_group + 1;

	echo "&nbsp;<a href=\"".$gotopage."&pp=$first_page_of_next_group\" class='btn btn-outline btn-default btn-xs'><i class='fa fa-angle-right'></i>
</a>&nbsp;";
	echo "<a href=".$gotopage."&pp=$num_pages class='btn btn-outline btn-default btn-xs'><i class='fa fa-angle-double-right'></i></a> \n";
	}
	echo "</div>";

	}

	public function LimitPage($current_page, $page_size="50")
	{
		if(!isset($current_page)){$current_page="1";}
		$start_row = ($current_page- 1) * $page_size ;
		return "LIMIT ".$start_row.", ".$page_size."";
	}

}

?>