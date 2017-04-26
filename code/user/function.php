<?php

// ---------- CONFIG
$year = 2560;

$path10th = "http://www2.iop.or.th/ApGroup/Download/10th";
$path11th = "http://www2.iop.or.th/ApGroup/Download/11th";

// ---------- ตรวจสอบวัน เวลาปัจจุบัน และหมายเลข IP

		$Nowdate=date("Y-m-d");
		$Nowtime=date("H:i:s");
		$datetime = "$Nowdate $Nowtime";
		$Check_ip=$_SERVER['REMOTE_ADDR'];




// ---------- แปลงค่าวันที่จากตัวเลข เป็น ตัวอักษร 

function displaydate ($xx,$lang) { //  xx = วันที่  / $lang = ภาษาที่ input
$thai_m=array ("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$date_array=explode ("-",$xx);
$y=$date_array [0];
$m=$date_array [1]-1;
$dd=explode (" ",$date_array [2]);
$d= $dd[0];

$m=$thai_m [$m];

	if($lang == "TH"){ // ถ้าเป็น พ.ศ.
	

		$displaydate="$y $m $d ".$dd[1];
		return $displaydate;
	}else{  // ถ้าเป้น ค.ศ.
		
		$y=$y+543;
		$displaydate="$d $m $y ".$dd[1];
		return $displaydate;

	}
}

function displaydate2 ($xx,$yy) { //  xx = วันที่
$thai_m=array ("01","02","03","04","05","06","07","08","09","10","11","12");
$date_array=explode ("/",$xx);
$y=$date_array [0];
$m=$date_array [1]-1;
$dd=explode (" ",$date_array [2]);
$d= $dd[0];

$m=$thai_m [$m];

		$y=$y+543;
		$displaydate="$d/$m/$y ".$dd[1];
		return $displaydate;

}

// ---------- แปลงค่าวันที่   d-m-y เป็น Y-m-d 

function changeformatdate($x){  // x = วันที่ ENG


$split=explode("/",$x);
$dd=$split[0]; $mm=$split[1]; $yy=$split[2]-543; // ถ้าค่ามาเป็นวันที่ไทยให้ใช้อันนี้
$dd=$split[0]; $mm=$split[1]; $yy=$split[2];
$change="$yy-$mm-$dd"; //ค่าที่ได้รับการแปลงแล้ว

return $change;

}

// ---------- select selectsql
function selectsql ($db,$x,$y){  // x = sql y = field ที่อยากจะแสดงผล

//include("dbconnect.php");
$db_query=mysql_db_query($db,$x);
$record=mysql_fetch_array($db_query);

	  return $record[$y];

}
// ---------- select selectsqlwhile
function selectsqlwhile ($x,$y){  // x = ID หน่วยงาน

include("connect.php");
$db_query=mysql_db_query($dbname,$x);
while($record=mysql_fetch_array($db_query)) {

	  echo $record[$y];
	  echo " / ";
	}
}

function chk_numrow($db,$sql){  // หาจำนวนแถวในตาราง

//include "connect.php";

$result=mysql_db_query($db,$sql);
$num = mysql_num_rows($result);

	return $num;

}


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



// ----------- upload รูป

function uploadpic($pic){

include('class.upload.php') ;




// เริ่มต้นใช้งาน class.upload.php ด้วยการสร้าง instant จากคลาส

// ภาพที่ 1
    $upload_image = new upload( $_FILES['pic'] ) ;
 
    //  ถ้าหากมีภาพถูกอัปโหลดมาจริง
    if ( $upload_image->uploaded ) {
 
        // ย่อขนาดภาพให้เล็กลงหน่อย  โดยยึดขนาดภาพตามความกว้าง  ความสูงให้คำณวนอัตโนมัติ
        /* ถ้าหากไม่ต้องการย่อขนาดภาพ ก็ลบ 3 บรรทัดด้านล่างทิ้งไปได้เลย
        $upload_image->image_resize         = true ; // อนุญาติให้ย่อภาพได้
        $upload_image->image_x              = 400 ; // กำหนดความกว้างภาพเท่ากับ 400 pixel 
        $upload_image->image_ratio_y        = true; // ให้คำณวนความสูงอัตโนมัติ
 */
 
        $upload_image->process("fileupload"); // เก็บภาพไว้ในโฟลเดอร์ที่ต้องการ  *** โฟลเดอร์ต้องมี permission 0777
 
        // ถ้าหากว่าการจัดเก็บรูปภาพไม่มีปัญหา  เก็บชื่อภาพไว้ในตัวแปร เพื่อเอาไปเก็บในฐานข้อมูลต่อไป
        if ( $upload_image->processed ) {
 
            $pic =  $upload_image->file_dst_name ; // ชื่อไฟล์หลังกระบวนการเก็บ จะอยู่ที่ file_dst_name
            $upload_image->clean(); // คืนค่าหน่วยความจำ
 
        }// END if ( $upload_image->processed )
 
    }//END if ( $upload_image->uploaded )


	//echo $pic;
	return $pic;

} // End uploadpic
?>