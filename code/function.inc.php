<?php
function permissions_edit($EmpNo){
	$DB = new Con_DB();
	return $DB->SelectSQLOne("select * from employee where EmpNo = '".$EmpNo."' and EmpNo in ('92','176')","EmpNo"); // 92อุบล / 176มาฆวดี
}

function NextID($sql,$return){ // หา ID ต่อไปจาก table
	$DB = new Con_DB();
	$lastid = $DB->SelectSQLOne($sql,$return);  // id สุดท้ายใน table
	return $lastid+1; // +1
}

// ---------- Array

// เดือนทั้งหมด
$monththai = array('มกราคม','กุมภาพันธ์','มีนาคม',"เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม
");


function datecut($x,$type) {
	$date_array=explode("-",$x);
	$y=$date_array[0]+543; // +543 เป็นปี พ.ศ
	$m=$date_array[1]-1;
	$d=$date_array[2];
	switch($type){
		case d :
			return $d;
		break;
		case m :
			return $m;
		break;
		case y :
			return $y;
		break;
	}
} 
// แปลงวันที่สากลผืดรูปแบบ เป็นแบบถูก
function DateFormat ($xx) { //  xx = วันที่ พ.ศ. 01/07/2016
	if($xx != ""){
$thai_m=array ("01","02","03","04","05","06","07","08","09","10","11","12");
$date_array=explode ("/",$xx);
$d=sprintf("%02d",$date_array [0]);
$m=$date_array [1]-1;
$yy=explode (" ",$date_array [2]);
$y= $yy[0];

$m=$thai_m [$m];

		//$y=$y+543;
		$displaydate="$y-$m-$d ".$dd[1];
		return $displaydate;
	}
}
function ChangDateEN ($xx) { //  xx = วันที่ ค.ศ 2015-03-31 TO 31 มี.ค. 2558
$thai_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$date_array=explode ("-",$xx);
$y=$date_array [0];
$m=$date_array [1]-1;
$dd=explode (" ",$date_array [2]);
$d= $dd[0];

$m=$thai_m [$m];

		$y=$y+543;
		$displaydate="$d $m $y".$dd[1];
		return $displaydate;

}

// ---------- ตรวจสอบวัน เวลาปัจจุบัน และหมายเลข IP

		$Nowdate=date("d-m-Y");
		$NowdateEN=date("Y-m-d");
		$Nowtime=date("H:i:s");
		$datetime = "$NowdateEN $Nowtime";
		$Check_ip=$_SERVER['REMOTE_ADDR'];

// ---------- ?????? Table

$RowColor1 = "#F8F4FF";
$RowColor2 = "#FFFFFF";

$NowPath = $_SERVER['SCRIPT_NAME']."?p=".$_GET['p'];


function backbutton(){

	echo "<a class='btn btn-warning' href='javascript:window.history.back(-1);'><i class='fa fa-arrow-circle-left'></i> ย้อนกลับ</a>";
}

function sumpercent($one,$two){
	//--- % ที่ทวงได้
            $percent1 = ($one*100)/$two;
            $percent_show = number_format($percent1, 0, '.', '');
            if($percent_show > 80){
              return "<span class='text-success'>".$percent_show." %</span>";
            }else{
              return  "<span class=''>".$percent_show." %</span>";
            }
}
function ValueAutocomplete($sql,$var){
	$DB = new Con_DB();
	$return = "";
	$sl_sql1 = $DB -> SelectSQL($sql);
	if(isset($sl_sql1)){
	foreach($sl_sql1 as $rs1){
		$return .= "'" . $rs1[$var] . "',";
	}echo rtrim($return, ",");
	}
}

function ClassUpload($FileUp,$Path){

// เริ่มต้นใช้งาน class.upload.php ด้วยการสร้าง instant จากคลาส

// ภาพที่ 1
    $upload_image = new upload($FileUp) ;

    //  ถ้าหากมีภาพถูกอัปโหลดมาจริง
    if ( $upload_image->uploaded ) {

        // ย่อขนาดภาพให้เล็กลงหน่อย  โดยยึดขนาดภาพตามความกว้าง  ความสูงให้คำณวนอัตโนมัติ
        /* ถ้าหากไม่ต้องการย่อขนาดภาพ ก็ลบ 3 บรรทัดด้านล่างทิ้งไปได้เลย
        $upload_image->image_resize         = true ; // อนุญาติให้ย่อภาพได้
        $upload_image->image_x              = 400 ; // กำหนดความกว้างภาพเท่ากับ 400 pixel 
        $upload_image->image_ratio_y        = true; // ให้คำณวนความสูงอัตโนมัติ
 */
        $upload_image->process($Path); // เก็บภาพไว้ในโฟลเดอร์ที่ต้องการ  *** โฟลเดอร์ต้องมี permission 0777

        // ถ้าหากว่าการจัดเก็บรูปภาพไม่มีปัญหา  เก็บชื่อภาพไว้ในตัวแปร เพื่อเอาไปเก็บในฐานข้อมูลต่อไป
        if ( $upload_image->processed ) {
 
            $File =  $upload_image->file_dst_name ; // ชื่อไฟล์หลังกระบวนการเก็บ จะอยู่ที่ file_dst_name
            $upload_image->clean(); // คืนค่าหน่วยความจำ

			return $File;
 
        }// END if ( $upload_image->processed )
 
    }//END if ( $upload_image->uploaded )

}




// ------------------- regis

function chk_status($x){  // รวจสอบสถานะลงทะเทียนสำหรับ admin

	switch($x){

		case "register";
		return "<button class='btn btn-warning disabled'>รอตรวจสอบ</button>";
		break;
		case "pay";
		return "<button class='btn btn-danger'>ส่งหลักฐานการชำระเงินแล้ว </button>";
		break;
		case "complete";
		return "<button class='btn btn-success disabled'>สมัครเสร็จสมบูรณ์</button>";
		break;

	}
}
function chk_statusPrint($x){  // รวจสอบสถานะลงทะเทียนสำหรับ admin

	switch($x){

		case "register";
		return "ยังไม่ได้ชำระเงิน";
		break;
		case "pay";
		return "ส่งหลักฐานแล้ว / รอตรวจสอบ";
		break;
		case "complete";
		return "ลงทะเบียนเสร็จสมบูรณ์";
		break;

	}
}
function chk_statususer($x,$id){  // ตรวจสอบสถานะลงทะเทียนสำหรับ user

	switch($x){

		case "register";
		return "<a href='register.php?page=register/pay.php&r_id=".$id."'><button class='btn btn-danger'>คลิกส่งหลักฐานการชำระเงิน</button></a>";
		break;
		case "pay";
		return "<button class='btn btn-warning disabled'>ส่งหลักฐานแล้ว / รอตรวจสอบ</button>";
		break;
		case "complete";
		return "<button class='btn btn-success disabled'>ลงทะเบียนเสร็จสมบูรณ์</button>";
		break;

	}
}
function chk_bill($x){  // ตรวจสอบใบเสร็จรับเงิน
	switch($x){
		case "complete";
		return "<img src='register/images/bill.png' width='30px'>";
		break;
	}
}

// ---------- แปลงค่าวันที่จากตัวเลข เหลือแค่เดือนเป็นภาษาไทย
function ShowMonth ($date) {
$thai_m=array ("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$date_array=explode ("-",$date);
$m=$date_array [1]-1;
$m=$thai_m [$m];
		return $m;
}
?>
