<?php 
/*
$PNG_TEMP_DIR = "../plugin/php_qrcode/temp/";
$errorCorrectionLevel = 'L';
$matrixPointSize = 20;
$Text = "kornthong-12345";
//echo $Text;

$filename = $PNG_TEMP_DIR.$Text.'.png';
   
//echo $filename;
QRcode::png($Text, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
echo '<img src="'.$PNG_TEMP_DIR.basename($filename).'" />';
*/
$PHP->QRCode("test");
?>