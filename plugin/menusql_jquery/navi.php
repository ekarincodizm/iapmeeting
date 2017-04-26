<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title></title>
<link type="text/css" href="plugin/menusql_jquery/menu.css" rel="stylesheet" />
<!-- <script type="text/javascript" src="plugin/menusql_jquery/jquery.js"></script> -->
<script type="text/javascript" src="plugin/menusql_jquery/menu.js"></script>
</head>
<body>
<?php 
// จำนวน sub menu
function chk_numrowparent($db,$x){
	
$sql ="select MenuParent from menusystem where MenuParent = $x";
$result=mysql_db_query($db,$sql);
$numrow = mysql_num_rows($result);

	return $numrow;

}

?>

<div id="menu">
  <ul class="menu">
    <li><a href="index.php" class="parent"><span>หน้าแรก</span></a></li>   
	<li><a href='#' class='parent'><span>ประวัติการซ่อมครุภัณฑ์</span></a>
	<ul>
	<li><a href='index.php?p=code/FixHistory/add.php'><span>เพิ่ม : ประวัติการซ่อมครุภัณฑ์</span></a></li>
	<li><a href='index.php?p=code/FixHistory/viewlistfix.php'><span>ดูรายการ : ประวัติการซ่อมครุภัณฑ์</span></a></li>
	
	</ul>
 
  <li><a href="login/logout.php" ><span>ออกจากระบบ</span></a></li> </ul>
</div>
<a href="http://apycom.com/"></a>
</body>
</html>