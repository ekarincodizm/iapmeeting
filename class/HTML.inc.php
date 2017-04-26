<?php
include_once ("../config.inc.php");
class HTML extends ConfigSystem
{
	public function Meta()
	{
		echo
		"
			<meta charset='utf-8'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<meta name='description' content=''>
			<meta name='author' content=''>
		";
	}
	public function Title($name="")
	{
		if(Empty($name)){$name = $this->Title;}echo "<title>".$name."</title>";
		echo "<link rel='shortcut icon' href='favicon.ico' />";
	}
	public function TitlePage($x)
	{
		echo "<h2 class='page-header'>".$x."</h2>";
		echo "<title>".$x."</title>";
	}
	public function TitleADMIN($name="")
	{
		if(Empty($name)){$name = $this->Title;}echo "<title>(ADMIN) ".$name."</title>";
		echo "<link rel='shortcut icon' href='faviconADMIN.ico' />";
	}
	public function BackButton($name="ย้อนกลับ")
	{
		echo 
		"
			<a class='btn btn-warning' href='javascript:window.history.back(-1);' style='margin:5px;'><i class='fa fa-arrow-circle-left'></i> ".$name."</a>
		";
	}
	public function AddButton($name="", $url)
	{
		echo 
		"
			<a href='".$this->BackendPath.$url."' class='btn btn-info' style='margin:5px;'><i class='fa fa-pencil-square-o fa-fw'></i>".$name."</a>
		";
	}
	public function SearchButton($name="", $url)
	{
		echo 
		"
			<a href='".$this->BackendPath.$url."' class='btn btn-success'><i class='fa fa-search fa-fw'></i>".$name."</a>
		";
	}
	public function ExportExcel($name="", $url, $target="")
	{
		echo 
		"
			<a href='".$url."' class='btn btn-primary' target='".$target."'><i class='fa fa-file-excel-o fa-fw'></i>".$name."</a>
		";
	}
	public function LinkIconButton($name, $url, $style, $icon)
	{
		echo
		"
			<a href='".$url."' class='various iframe' id='edit'>
							<div class='btn btn-".$style." btn-lg col-md-2' style='margin:5px;' >
								<img src='../images/icon/".$icon."' width='100px'>
								<hr>
								".$name."
								<i class='fa fa-arrow-circle-right'></i>
							</div>
						</a>  
		";
	}
	public function LinkIconButton2($name, $name2="", $url, $style, $icon ,$num="")
	{
		if($num != "0"){$echonum = "<span class='ViewReport_num'>".$num."</span>";}
		echo
		"
			<a href='".$url."'>
							<div class='btn btn-".$style." btn-lg col-md-3' style='margin:5px; width:350px;' >
								<span class='ViewReport_icon' ><img src='../images/icon/".$icon."' width='100px'></span>
								<span class='ViewReport_name'>
								<span style='font-size:32pt;'>".$name."</span>
								<br>".$echonum."
								".$name2."
								<i class='fa fa-arrow-circle-right'></i>
								</span>
								
							</div>
						</a>  
		";
	}
	function NotiAudio($noti)
	{
		if($noti){
		echo "
				<audio autoplay>
				<source src='vacationtime.ogg' type='audio/ogg'>
				<source src='vacationtime.mp3' type='audio/mpeg'>
				Your browser does not support the audio element.
				</audio>
			";
		}
	}
	function clear()
	{
		echo "<div style='clear: both;'></div>";
	}
	function popupindex($open,$url=""){
		if($open == "yes"){
		echo"
		<script>
		$(document).ready(function () {
				$.fancybox({
				   'width': '90%',
					'height': 'auto',
					'autoScale': false,
					'transitionIn': 'fade',
					'transitionOut': 'fade',
					'type': 'iframe', /* 'type': 'iframe', ถ้าเป็นรูปอย่างเดียวจัด iframe ออกจาก type*/ 
					'href': '".$url."'
				});
		});
		</script> 
		";
		}
	}


}
?>

