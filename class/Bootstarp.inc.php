<?php

class Bootstarp
{
	public function PageHeader($name="",$sub="")
	{
		echo "<h1 class='page-header'>".$name."<h4>".$sub."</h5></h1>";
	}

	public function Breadcrumb()
	{
		echo
		"
			<ol class='breadcrumb'>
				<li>
					<a href='index.php'>
						<i class='fa fa-home fa-fw'></i>หน้าแรก
					</a>
				</li>
							<li class='active'>
                                <i class='fa fa-list-alt fa-fw'></i> ประวัติการซ่อมครุภัณฑ์
                            </li>
						</ol>
		";
	}
	public function Row($RowWidth="col-md-12")
	{
		echo
		"
			<div class='row'>
			<div class='".$RowWidth."'>
		";
	}
	public function RowClose()
	{
		echo
		"
			</div> <!-- End col-md-12 -->
			</div> <!-- End row -->
		";
	}
	public function Well($WellWidth="col-md-12")
	{
		echo
		"
			<div class='well'>
			<div class='row'>
			<div class='".$WellWidth."'>
		";
	}
	public function WellClose()
	{
		echo
		"
			</div> <!-- End well Width -->
			</div> <!-- End row -->
			</div> <!-- End well -->
		";
	}
	public function Panel($head="",$id_body="", $PanelWidth="col-md-12", $style="info")
	{
		echo	"<div class='panel panel-".$style."'>";

		if($head){echo "<div class='panel-heading'>".$head." ";
		if($id_body!=""){
		echo "<button type='button' class='btn btn-default btn-circle' id='bt_toggle'><i class='fa fa-chevron-down'></i></button>";
		}
		echo "</div>";}

			echo "
			<div class='panel-body' id='".$id_body."'>
			<div class='row'>
			<div class='".$PanelWidth."'>
		";
	}

	public function PanelClose($footer="")
	{
		if($footer != ""){$ft = "<div class='panel-footer'>".$footer."</div>";}
		else{$ft = "";}
		echo
		"
			</div> <!-- End col-md-7 -->
			</div> <!-- End Row -->
			$ft
			</div> <!-- panel-body -->
			</div> <!-- panel panel-info -->
		";
	}
	public function line()
	{
		echo "<div  class='col-sm-12 col-ml-12 col-lg-12'><hr></div>";
	}



}

?>