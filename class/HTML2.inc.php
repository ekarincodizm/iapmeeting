<?php
include_once("../class/ConDB.inc.php");
class HTML2 extends Con_DB
{
	public function ViewDiv($label, $show="", $show2="", $class="col-sm-4 col-ml-2 col-lg-2")
	{
		if($show){
		echo
		"
			<div id='ViewDivDetail' style=' '><b>
				<span class='ViewDivLabel'>".$label."</span></b> : ".$show."";
			if($show2){echo " | ".$show2;}
			echo "</div>";

		}
	}
	public function ViewDiv2($label, $show="", $show2="", $class="col-sm-4 col-ml-2 col-lg-2")
	{
		if($show){
		echo
		"
			<div id='ViewDivDetail2' style=' '><b>
				<span class='ViewDivLabel2'>".$label."</span></b> : ".$show."";
			if($show2){echo " | ".$show2;}
			echo "</div>";

		}
	}
	
	public function Print_Button($sb_id)
	{
		$showlink = "<a href='adm_index2.php?p=Backend/Print.php&sb_id=".$sb_id."' target='_blank' >";
	echo "<a href='blank.php?p=Print.php&sb_id=".$sb_id."' target='_blank' >";	
	echo "
	<span class='PrintButton'><i class='fa fa-print' aria-hidden='true'></i>
Print</a>
	</span>";
	}
	public function SN_Button($SN,$link="",$case="")
	{
		if($link){$showlink = "<a href='../FileUpload/".$link."' target='_blank' >";
		$icon = "<i class='fa fa-file-text' ></i>";
		}else{$showlink = "<a href='#'>";}
	echo "".$showlink."
	<span class='sn'>- ".$case." - <br>".$SN." ".$icon."
	</a>
	</span>";
	}
	public function SN_ButtonToggle($SN,$link="")
	{
	if($link){$icon = "<i class='fa fa-file-text' ></i>";}
	echo "<span class='sn'>".$SN." ".$icon."</span>";
	}
	public function SN_ButtonLink($SN,$link="")
	{
	if($link){$icon = "<i class='fa fa-file-text' ></i>";}
	echo "<a href='../FileUpload/".$link."' target='_blank'><span class='sn'>".$SN." ".$icon."</span></a>";
	}
	public function SN_OldCase($id)
	{
	$sql = $this->SelectSQL("select * from sb_oldcase where sb_id='".$id."'");
	if($sql){
		echo "<span class='OldCase'><u>เบอร์เก่า</u><ul>";
		foreach($sql as $rs1){
		echo "<a href='../FileUpload/".$rs1['oldcase_file']."' target='_blank'><li>".$rs1['oldcase']."</li></a>";
		}
	}
	echo "</ul></span>";
	}
	function SN_Highlight($id)
	{
		$sql = $this->SelectSQL("select * from sb_main where sb_id='".$id."'");
		foreach($sql as $rs1){}
		echo "<div class='highlight'>";
		$this->SN_ButtonToggle($rs1['sb_SN'],$rs1['sb_report']);
		$this->SN_OldCase($id);
		if($rs1['sb_wantdate'] != '0000-00-00'){echo "<span class='wantdate'>ต้องการมารับวันที่<br><u>".ChangDateEN($rs1['sb_wantdate'])."</u></span>";}
		echo "<span class='detail'> ชื่อผู้ขอยืม / รพ : ".$rs1['sb_hospital'].$rs1['sb_inside']."<br>";
		echo "ชื่อผู้ป่วย  : ".$rs1['sb_patient']."<br>";
		echo "ต้องการขอ  : ".chk_WantType($rs1['sb_type'])."";
		echo "</span>";	
		echo "</div>";
		if($rs1['sb_pathodatetime'] !="0000-00-00 00:00:00"){
			
		echo "<div class='highlight2'>";
		$this->ViewDiv("แพทย์", $rs1['sb_sendpatho'],$rs1['sb_pathodatetime']);
		$this->ViewDiv("H & E stain", $rs1['sb_HE']);
		$this->ViewDiv("Special stain", $rs1['sb_special']);
		$this->ViewDiv("Immunoperoxidase stain", $rs1['sb_immuno']);
		$this->ViewDiv("Unstained Slides", $rs1['sb_unstained']);
		$this->ViewDiv("Paraffin block", $rs1['sb_paraffin']);
		
		echo "</div>";
		}
		echo "<div id='report' align='center'><iframe src='../FileUpload/".$rs1['sb_report']."' width='98%' height='300'  frameborder='0' scrolling='auto'></iframe></div>";
	}
	function SN_HighlightV2($id)
	{
		$sql = $this->SelectSQL("select * from sb_main where sb_id='".$id."'");
		foreach($sql as $rs1){}
		echo "<div class='highlight'>";
		$this->SN_Button($rs1['sb_SN'],$rs1['sb_report'],$rs1['sb_case']);
		$this->SN_OldCase($id);
		if($rs1['sb_wantdate'] != '0000-00-00'){echo "<span class='wantdate'>ต้องการมารับวันที่<br><u>".ChangDateEN($rs1['sb_wantdate'])."</u></span>";}
		echo "<span class='detail'> ชื่อผู้ขอยืม / รพ : ".$rs1['sb_hospital'].$rs1['sb_inside']."<br>";
		echo "ชื่อผู้ป่วย  : ".$rs1['sb_patient']."<br>";
		echo "ต้องการขอ  : ".chk_WantType($rs1['sb_type'])."";
		echo "</span>";	
		echo "</div>";
		if($rs1['sb_pathodatetime']){
			
		/*echo "<div class='highlight2'>";
		$this->ViewDiv("แพทย์", $rs1['sb_sendpatho'],$rs1['sb_pathodatetime']);
		$this->ViewDiv("H & E stain", $rs1['sb_HE']);
		$this->ViewDiv("Special stain", $rs1['sb_special']);
		$this->ViewDiv("Immunoperoxidase stain", $rs1['sb_immuno']);
		$this->ViewDiv("Unstained Slides", $rs1['sb_unstained']);
		$this->ViewDiv("Paraffin block", $rs1['sb_paraffin']);
		*/
		echo "</div>";
		}
		//echo "<div id='report' align='center'><iframe src='../FileUpload/".$rs1['sb_report']."' width='98%' height='300'  frameborder='0' scrolling='auto'></iframe></div>";
	}

}
?>

