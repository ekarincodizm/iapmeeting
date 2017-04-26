<?php


switch($_GET['action']){

	case 'Del_regis' :
		$sql="UPDATE mtregis_main SET reg_status = 'cancel'
		WHERE reg_id = '".$_GET['r_id']."' ";
		$result = $DB->QuerySQL($sql);
	break;
	case 'Del_PicPay' :
		$sql="UPDATE mtregis_main SET reg_pay = '' , reg_status = 'register'
		WHERE reg_id = '".$_GET['r_id']."' ";
		echo $sql;
		$result = $DB->QuerySQL($sql);
	break;

}// End switch GET



if ($result) {
	echo "<script language='javascript'>

window.opener.location.reload();
window.close();
</script>";
}
?>
