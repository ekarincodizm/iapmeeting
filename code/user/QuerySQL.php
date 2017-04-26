<?php
//print_r($_POST);
switch($_POST['action']){

	case 'AddRegis' :

				$sql = "
INSERT INTO regis_main
	(reg_id, 
	reg_prefix, 
	reg_name, 
	reg_surname,
	reg_position,
	reg_mobile, 
	reg_email, 
	reg_workgroup, 
	reg_locationcontact, 
	reg_jangwat, 
	reg_amphur, 
	reg_tambon, 
	reg_postcode, 
	reg_teloffice, 
	reg_fax, 
	reg_receiptname, 
	reg_food,  
	reg_remark, 
	reg_datesave,
	reg_th,
	reg_pic, 
	reg_status
	)
	VALUES
	('".$_POST['reg_id']."', 
	'".$_POST['reg_prefix']."', 
	'".$_POST['reg_name']."', 
	'".$_POST['reg_surname']."', 
	'".$_POST['reg_position']."', 
	'".$_POST['reg_mobile']."', 
	'".$_POST['reg_email']."', 
	'".$_POST['reg_workgroup']."', 
	'".$_POST['reg_locationcontact']."', 
	'".$_POST['reg_jangwat']."', 
	'".$_POST['reg_amphur']."', 
	'".$_POST['reg_tambon']."', 
	'".$_POST['reg_postcode']."', 
	'".$_POST['reg_teloffice']."', 
	'".$_POST['reg_fax']."', 
	'".$_POST['reg_receiptname']."', 
	'".$_POST['reg_food']."', 
	'".$_POST['reg_remark']."', 
	'".$_POST['reg_datesave']."', 
	'".$_POST['reg_th']."', 
	'".$_POST['reg_pic']."', 
	'".$_POST['reg_status']."'
	)
	"; 	

	break;
	
}// End switch GET
echo $sql;
$result = $DB->QuerySQL($sql);

if($_POST['backPath']){
		echo "<script language='javascript'>window.location.href='".$_POST['backPath'].$open_poll."';</script>";
		}


?>

