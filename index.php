<?php
ob_start();
session_start();

/// -------------- End Joomla

include_once "plugin/captchastylish99/captcha.php";
include("register/function.php");
include_once "plugin/oop.php";
include_once "plugin/plugin.php";
$PHP->Inc("sb-admin-2/attach.html");
//print_r($_SESSION);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>โครงการประชุมวิชาการสมาคมเวชสถิติแห่งประเทศไทย ประจำปี 2560</title>
<link href="admregis/mystyle.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="register/stype_bykorn.css" media="all" />
</head>
<body>
<?php
include_once "sb-admin-2/index.php";
?>
<div id="main">
<?php include_once "register/NaviUserTop.php"; ?>
<img src="admregis/images/head_meeting2560.jpg" />


<div id="content">
<?php

if($_GET['page'] !=""){
include($_GET['page']);
}
?>
</div><!-- End content -->

<div id="content3">
	<?php include_once "admregis/Footer.php"; ?>
</div>
</div> <!-- End Main -->


</body>
</html>