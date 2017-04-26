<html>
<head>
<title>ทำเนียบรุ่น 10</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stype_bykorn.css" />
<script language="JavaScript" type="text/JavaScript">
function ClearText(ControlName){
	eval("document."+ControlName+".value='';");  
}

function popUpSearch1(src) {
		var w = screen.availWidth;
		var h = screen.availHeight;
		var popW = 500, popH = 450;
		var leftPos = (w-popW)/2, topPos = (h-popH)/2;
			window.open(src, 'poppage', 'toolbars=0, scrollbars=yes, location=0, statusbars=yes, menubars=0, resizable=0, width='+popW+', height='+popH+', left ='+leftPos+', top ='+topPos);
}

function fncSubmit()
{

		document.frm.submit();
}
</script>
<script type="text/javascript"> //สคลิปเปิด popup หน้าใหม่
function popup(url,name,windowWidth,windowHeight){    
	myleft=(screen.width)?(screen.width-windowWidth)/2:100;	
	mytop=(screen.height)?(screen.height-windowHeight)/2:100;	
	properties = "width="+windowWidth+",height="+windowHeight;
	// เต็มจอ properties = "fullscreen"; //
	properties +=",scrollbars=yes,menubar=yes, top="+mytop+",left="+myleft;   
	window.open(url,name,properties);
}
</script>
</head>
<body >
<p>
<?php
include("function.php");
include("dbconnect.php"); conndb();
?>
</p>
<div align="center">
	<div class="diary">

<table width="900px" border="0" cellspacing="0" cellpadding="0">

<tr><th colspan="3"><img src="../images/nameweb10.jpg" /></th></tr>

<?php

$sql = "select * FROM regis_main where reg_status != 'c' ORDER BY reg_id ASC";
$db_query=mysql_db_query($dbname,$sql);
$num_rowsanswer = mysql_num_rows($db_query);
$num=1;
while ($num <= $num_rowsanswer) { 
$record=mysql_fetch_array($db_query);

$RowColor1 = "#FFFFFF";
$RowColor2 = "#FFFFFF";
$bgc = ($bgc==$RowColor1) ? $RowColor2 : $RowColor1;

echo "<tr>
		<td align='center'>".$num."</td>
		<td align='center'><img src='fileupload/".$record[reg_pic]."' width='200px'></td>
		<td>
		ชื่อ : ".$record[reg_name]."
		<br/>หน่วยงาน : ".$record[reg_workgroup]."
		<br/>โทรศัพท์มือถือ : ".$record[reg_mobile]."
		<br/>อีเมลล์ : ".$record[reg_email]."
		
		
		
		
		</td>
		
	</tr>
	";


$num++;	//เพิ่มอีก1
}
?>


</table>


	</div>
</div>

</body>
</html>
