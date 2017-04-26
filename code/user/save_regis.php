<html Powered by kornthong>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php

//echo $_POST[savepresent];
// ---------- insert 


			$insertSQL = "
INSERT INTO mtregis_main
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
	);
	
	"; 
	$result = $DB->QuerySQL($insertSQL);
           

echo $insertSQL;
//echo $_POST['reg_id'];
/*
if ($result){	
			echo "
			<script language='javascript'>
			window.opener.location.href='index.php?p=user/print.php&reg_name=".$_POST['reg_name']."&reg_surname=".$_POST['reg_surname']."';
			window.open('','_self');window.close();
			</script>
			";
}




*/

?>