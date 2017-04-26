<?php
session_start();
date_default_timezone_set ('Asia/Bangkok');
include_once ("../class/ConDB.inc.php");
//include_once ("../login/chk_login.php");
include_once ("../class/Bootstarp.inc.php");
include_once ("../class/HTML.inc.php");
include_once ("../class/HTML2.inc.php");
include_once ("../class/PHP.inc.php");
include_once ("../class/FORM.inc.php");
include_once ("../class/TABLE.inc.php");
include_once ("../plugin/plugin.php");
//include_once ("../code/function.inc.php");
include_once ("../attach/java.php");
error_reporting (E_ALL ^ E_NOTICE);
$PHP = new PHP();
$HTML = new HTML();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="../css/mystyle.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/stype_bykorn.css" rel="stylesheet" type="text/css"  media="all" />
<?php
$HTML->Meta();
$PHP->Inc("../attach/sb-admin-2/attach.html");

?>
</head>
<body>
<div class="Headerpage">
	<IMG SRC="../images/logo_green.png" WIDTH="40px"BORDER="0" ALT=""><B>IAP</B>
<button type="button"  id="navicon" class="btn btn-outline btn-default"> <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
</button>

</div>
<div id="wrapper">
<?php
$PHP->Inc("../code/NaviUserTop.php"); 
?>
	<div id="page-wrapper">
		<div class="row">
<?php $PHP->Content(@$_GET['p'].".php", $_SESSION['EmpUserStatus']); ?>
		</div><!-- /.row -->
	</div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<div id="content3">
	<?php include_once "Footer.php"; ?>
</div>
</body>
</html>
