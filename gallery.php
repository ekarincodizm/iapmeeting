<html>
<head>
<title>Gallery</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
#mainbox{
	background-color: #0099FF;
}
#mainbox .left{
	float: left;
	background-color: #FFFFFF;
	padding: 5px;
}
#mainbox .right{
	padding: 5px;
	float: left;
	width: 450px;
}
.button{
	padding: 5px;
	background-color: #FF6600;
	display:block;
	bottom: 5px;
	right: 5px;
	position: absolute;
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
</style>
</head>
<body>

<?php
include("mrstmember/dbconnect.php"); 
$user =& JFactory::getUser(); // GetUser
?>


<div id="mainbox">
<span class="left"><img src="images/Gallery/index/g1.jpg"></span>
<span class="right"><P>ชื่ออัลบั้ม :: </P><P>วันที่ :: </P><P>จำนวนภาพทั้งหมด :: </P></span>
<span class="button">ดูภาพทั้งหมด</span>
</div>

</FORM>
</body>
</html>
