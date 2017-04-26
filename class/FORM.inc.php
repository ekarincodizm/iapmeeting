<?php
include_once("../class/ConDB.inc.php");
class FORM extends Con_DB
{
	public $FormGroupLabelClass = "class='col-sm-5 col-md-2 form-group'";
	public $FormGroupControlClass = "class='col-sm-6 col-md-4 form-group'";
	public $FormSubmitClass = "class='btn btn-info btn-lg'";
	public $FormMethod = "POST";
	public $FormControlClass = "form-control";


	public function Open($action,$id="",$class="", $target="", $file="")
	{
		if($file != ""){$file = "enctype='multipart/form-data'";}
		echo
		"
			<form method='".$this->FormMethod."' action='".$action."' id='".$id."' class='".$class."' target='".$target."' ".$file.">
		";
	}
		
	
	public function Label($name)
	{
		echo
		"
			<div class='col-sm-12 col-md-12 form-group'>
				<span class='LabelForm'>".$name." :</span>
			</div><br>
		";
	}
	public function LabelColor($name,$color="")
	{
		echo
		"
			<div class='col-sm-12 col-md-12 form-group'>
				<span class='LabelFormColor' style='background-color:".$color.";'>".$name." :</span>
			</div><br>
		";
	}
	public function Section($name)
	{
		echo
		"
			<div class='col-sm-12 col-ml-12 col-lg-12'>
				<h3 class='page-header'>".$name."</h3>
			</div>
		";
	}

	public function Text($text)
	{
		echo
		"
			<div ".$this->FormGroupControlClass." >
				".$text."
			</div>
		";
	}

	public function TextBox($label, $name,$value="", $width="", $class="", $title="",$disabled="",$placeholder="")
	{
		if($label){	 $showlabel = "<span class='LabelForm'>".$label." :</span><br>";}else{$showlabel="";}
		echo
		"
			<div ".$this->FormGroupControlClass." >
				". $showlabel."
				<input type='text' name='".$name."' value='".$value."' style='width:".$width.";' id='".$name."' class='".$this->FormControlClass." ".$class."' title='".$title."' placeholder='".$placeholder."' ".$disabled." />
			</div>
		";
	}
	public function TextMail($label, $name,$value="", $width="", $class="", $title="",$disabled="",$placeholder="")
	{
		if($label){	 $showlabel = "<span class='LabelForm'>".$label." :</span><br>";}else{$showlabel="";}
		echo
		"
			<div ".$this->FormGroupControlClass." >
				". $showlabel."
				<input type='email' name='".$name."' value='".$value."' style='width:".$width.";' id='".$name."' class='".$this->FormControlClass." ".$class."' title='".$title."' placeholder='".$placeholder."' ".$disabled." />
			</div>
		";
	}
	public function TextBox_inline($label, $name,$value="", $width="", $col="", $class="",$disabled="",$placeholder="")
	{
		
		
		echo
		"
			<div class='col-sm-".$col." col-md-".$col." form-group'>
			".$label." : "."
				". $showlabel."
				<input type='text' name='".$name."' value='".$value."' style='width:".$width.";' id='".$name."'  class='".$this->FormControlClass." ".$class."' placeholder='".$placeholder."' ".$disabled." />
			</div>
		";
	}

	public function TextBoxDate($label, $name,$value="", $datenow, $width="", $id="", $class="", $title="",$free="")
	{
		if($datenow == "datenow"){$value = date("Y-m-d");}else{$value = $value;}
		echo
		"
			<div ".$this->FormGroupControlClass." >
				<span class='LabelForm'>".$label." :</span><br>
				<input type='text' name='".$name."' value='".$value."' style='width:".$width.";' id='".$id."' class='".$this->FormControlClass." ".$class."' title='".$title."' placeholder='____-__-__' onkeyup='autoTabdateEN(this)' ".$free."/>
			</div>
		";
	}

	public function TextBoxMoney($label, $name,$value="", $width="", $id="", $class="", $title="",$free="")
	{
		echo
		"
			<div ".$this->FormGroupControlClass." >
				<span class='LabelForm'>".$label." :</span><br>
				<input type='text' name='".$name."' value='".$value."' style='width:".$width.";' id='".$id."' class='".$this->FormControlClass." ".$class."' title='".$title."' OnChange='JavaScript:chkNum(this)' ".$free."/>
			</div>
		";
	}

	public function TextBoxInputPopup($label, $name,$value="", $width="", $class="", $title="",$popup="")
	{
		echo
		"
			<div class='col-sm-8 col-md-4 form-group' >
				<span class='LabelForm'>".$label." :</span><br>
				<input type='text' name='".$name."' value='".$value."' style='width:".$width.";' id='".$name."' class='".$this->FormControlClass." ".$class."' title='".$title."' readonly/>
				<a id='popupdata' class='various iframe' href='index2.php?p=Backend/vendorpopup.php' title='เลือกข้อมูล'><i class='fa fa-search'></i></a>
			</div>
			
		";
	}
		public function TextBoxSearch($label, $name,$value="", $class="", $width="",$alt="BoxSearch",$disabled="",$placeholder="")
	{ 
			if($label){	 $showlabel = "<span class='LabelForm'>".$label." :</span><br>";}else{$showlabel="";}
			echo
			"
				<div ".$this->FormGroupControlClass." >
					".$showlabel."
					<INPUT TYPE='text' name='".$name."' id='".$name."' value='".$value."'  class='".$this->FormControlClass." ".$class."' alt='".$alt."' style='width:".$width.";' placeholder='".$placeholder."'>
		
				</div>
			";
	}
	public function TextArea($label, $name,$value="", $cols=50, $rows=2, $class="", $placeholder="" , $disabled="")
	{
		if($label){	 $showlabel = "<span class='LabelForm'>".$label." :</span><br>";}else{$showlabel="";}
		echo
		"
			<div ".$this->FormGroupControlClass." >
				".$showlabel."
				<TEXTAREA NAME='".$name."' ROWS='".$rows."' COLS='".$cols."'  id='".$name."' class='".$this->FormControlClass." ".$class."' placeholder='".$placeholder."' ".$disabled.">".$value."</TEXTAREA>
			</div>
		";
	}
	public function SelectBox($label, $name, $sql, $value, $valuename , $valuename2 , $selected="", $showvalue="no", $firstrecord="yes", $class="")
	{ 
		$sl_list = $this->SelectSQL($sql);
		echo
		"
		<div ".$this->FormGroupControlClass." >
		<span class='LabelForm'>".$label." :</span><br>
		<select name='".$name."' id='".$name."' class='".$this->FormControlClass." ".$class."' >
		";
		if($firstrecord == "yes"){echo "<option value=''></option>";}else{}
			foreach($sl_list as $rslist)
			{
			if($selected == $rslist[$value]){$slt = "SELECTED";}else{$slt = "";}
			if($showvalue == "yes"){$shw_val = $rslist[$value];}
			
			echo "<option value='".$rslist[$value]."' ".$slt.">".$shw_val." ".$rslist[$valuename]." ".$rslist[$valuename2]." ";
			echo "</option>";
			}
		echo "</select></div>";
	}
	public function SelectBoxName($label, $name, $sql, $value, $selected="", $firstrecord="yes", $class="")
	{ 
		$sl_list = $this->SelectSQL($sql);
		echo
		"
		<div ".$this->FormGroupControlClass." >
		<span class='LabelForm'>".$label." :</span><br>
		<select name='".$name."' id='".$name."' class='".$this->FormControlClass." ".$class."' >
		";
		if($firstrecord == "yes"){echo "<option value=''></option>";}else{}
			foreach($sl_list as $rslist)
			{
				$fullname = $rslist['PrefixNameTH'].$rslist['EmpFirstName']." ".$rslist['EmpLastName'];
				if($value == "fullname"){$valueshow = $fullname;}else{$valueshow = $rslist[$value];}
				
			if($selected == $valueshow){$slt = "SELECTED";}else{$slt = "";}
				
			echo "<option value='".$valueshow."' ".$slt.">".$fullname." ";
			echo "</option>";
			}
		echo "</select></div>";
	}
	public function SelectBoxArray($label, $name, $value, $Label, $selected="", $class="")
	{
		echo
		"
		<div ".$this->FormGroupControlClass." >
		<span class='LabelForm'>".$label." :</span><br>
		<select name='".$name."' id='".$name."' class='".$this->FormControlClass." ".$class."' >
		<option value=''>
		";
			for($i=0; $i<count($Label); $i++){
				if($selected == $value[$i]){$slt = "SELECTED";}else{$slt = "";}
				echo "<option value='".$value[$i]."' ".$slt.">".$Label[$i]."</option>";
			}
		echo "</select></div>";
	}

	public function RadioButton($label, $name, $labelinput, $value, $active="", $class="radio-inline")
	{
echo "
		<div class='col-sm-12 col-md-12 form-group' >
			<span class='LabelForm'>".$label." :</span><br>
				";
				for($i=0; $i<count($labelinput); $i++){
				if($active == $value[$i]){$checked = "checked";}else{$checked = "";}
				echo "
				<label class='".$class."' >
				<input type='radio' class='validate[required] radio' name='".$name."' id='".$name."' value='".$value[$i]."' ".$checked."> ".$labelinput[$i]." 
				</label>";
			}	
echo "</div>";

	}
	public function CheckBox($label, $name, $labelinput, $value, $active="", $class="radio-inline",$required="validate[required]")
	{
		if($label){	 $showlabel = "<span class='LabelForm'>".$label." :</span><br>";}else{$showlabel="";}
echo "
		<div class='col-sm-12 col-md-12 form-group' >
			".$showlabel."
				";
				for($i=0; $i<count($labelinput); $i++){
				if($active[$i] == $value[$i]){$checked = "checked";}else{$checked = "";}
				echo "
				<label class='".$class."'>
				<input type='checkbox' class='".$required."' name='".$name."[]' id='".$name."' value='".$value[$i]."' ".$checked."> ".$labelinput[$i]." 
				</label>";
			}	
echo "</div>";

	}
	public function FileUp($label,$name,$required="",$oldfile="",$path="") // $value = ชื่อไฟล์เดิม / $path ที่เก็บไฟล์เดิม
	{
		echo
		"
			<div ".$this->FormGroupControlClass.">
				<span class='LabelForm'>".$label." :</span><br>
				<input name='".$name."' id='".$name."' type='file' size='30' ".$required." />

		";
		if($oldfile != ""){
		echo "[ไฟล์เก่า] : <a href='".$path.$oldfile."' target='_blank'>".$oldfile."</a>";
		echo "<input type='hidden' name='".$name."old' id='".$name."old' value='".$oldfile."'>";
		}

			echo "</div>";
	}
	public function button($label="", $id="")
	{
		echo 
		"
			
			<div ".$this->FormGroupControlClass." >
			<br><br>
				<button name='".$id."' id='".$id."' class='btn btn-default btn-sm' type='button'>".$label."</button>
			</div>
		";
	}
	public function Captcha($label="")
	{
		if($label){	 $showlabel = "<span class='LabelForm'>".$label." :</span><br>";}else{$showlabel="";}
		echo
		"
			<div ".$this->FormGroupControlClass." >
				". $showlabel."
				<input type='text' name='codecaptcha' style='width:100px;' id='codecaptcha' class='".$this->FormControlClass."' title='".$title."' placeholder='' required />
			<img src='../plugin/captchastylish99/get_captcha.php' alt='' id='captcha' />
			<img src='../plugin/captchastylish99/refresh.jpg' width='20' alt='' id='refresh' />
			<input id='submit_handle' type='submit' style='display: none'>
			</div>
		";

	}
	public function Submit($name="บันทึกข้อมูล", $text="", $id="" ,$captcha="")
	{
		if($captcha != ""){$functioncaptcha = "OnClick='JavaScript:fncSubmit();'";}
		echo 
		"
			<div class='col-sm-12 col-md-12 form-group'></div>
			<div ".$this->FormGroupControlClass." >
				<button  ".$this->FormSubmitClass." type='submit' name='".$name."' id='".$id."' ".$functioncaptcha.">".$name."</button>
				<span id='".$id."' class='text-danger'>".$text."</span>
			</div>
		";
	}

	public function Hidden($name,$value="")
	{
		echo 
		"
			<INPUT TYPE='hidden' NAME='".$name."' id='".$name."' VALUE='".$value."'>
		";
	}

	public function Clear()
	{
		echo "<div class='clear'></div>";
	}

	public function Close()
	{
		echo "</FORM>";
	}

}

?>

