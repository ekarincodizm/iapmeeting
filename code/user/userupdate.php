<html Powered by kornthong>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
include("function.php");
include("dbconnect.php"); conndb();

?>
<?php

include('class.upload.php') ;
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

	$reg_pic = '';
    $upload_image = new upload( $_FILES['reg_pic'] ) ;
 
    if ( $upload_image->uploaded ) {
 
        $upload_image->process("fileupload");
        if ( $upload_image->processed ) {
 
            $reg_pic =  $upload_image->file_dst_name ; 
            $upload_image->clean(); // คืนค่าหน่วยความจำ
 
        }// END if ( $upload_image->processed )
    }//END if ( $upload_image->uploaded )
}//END if ((isset($_POST["MM_insert"])) 


$insertSQL = "
UPDATE regis_main
	SET
	reg_pic = '$reg_pic'	
	WHERE
	reg_id = '$_POST[reg_id]'
	;
	
	"; 
            mysql_select_db($dbname, $conn);
            $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

if ($Result1){
	echo "
			<script language='javascript'>
			window.opener.location.href='../index.php';
			window.open('','_self');window.close();
			</script>
			";
} // End else





?>