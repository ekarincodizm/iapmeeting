<html Powered by kornthong>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<?php
include('class.upload.php') ;

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

	$reg_pic = '';
    $upload_image = new upload( $_FILES['reg_pay'] ) ;
 
    //  ถ้าหากมีภาพถูกอัปโหลดมาจริง
    if ( $upload_image->uploaded ) {
 
        $upload_image->process("register/filepay");
        if ( $upload_image->processed ) {
 
            $reg_pay =  $upload_image->file_dst_name ; 
            $upload_image->clean(); 
 
        }// END if ( $upload_image->processed )
    }//END if ( $upload_image->uploaded )
}//END if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))

$sqlquery = "
UPDATE mtregis_main
	SET
	reg_pay = '".$reg_pay."',
	reg_status = 'pay'
	
	WHERE
	reg_id = '".$_POST['reg_id']."'

	"; 
            mysql_select_db($dbname, $conn);
            $Result1 = mysql_query($sqlquery, $conn) or die(mysql_error());



//echo $groupuser;
if ($Result1){

	if($groupuser == "8" || $groupuser == "3" || $groupuser == "4"){ // 8 Super User / 3 เหรัญญิก / 4 ผู้ดูแลข่าวสาร
	$link = "admregis.php?page=adm_regismain";
	}else{
	$link = "register.php?page=register/viewall.php";
}

			echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=".$link."'>";
} // End else
?>