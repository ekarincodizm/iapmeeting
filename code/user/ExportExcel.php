<?php session_start();
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="ExcelExport.xls"');#ชื่อไฟล์
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<HTML>
<HEAD>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
</HEAD>
<BODY>
<?php echo $_SESSION['TableExport']; ?>
</BODY>
</HTML>