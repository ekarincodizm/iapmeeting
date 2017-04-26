<?php
ob_start();
session_start();

// Start Joomla
define('_JEXEC', 1);
define('DS', DIRECTORY_SEPARATOR);

if (file_exists(dirname(__FILE__) . '/defines.php')) {
	include_once dirname(__FILE__) . '/defines.php';
}

if (!defined('_JDEFINES')) {
	define('JPATH_BASE', dirname(__FILE__));
	require_once JPATH_BASE.'/includes/defines.php';
}

require_once JPATH_BASE.'/includes/framework.php';

// Mark afterLoad in the profiler.
JDEBUG ? $_PROFILER->mark('afterLoad') : null;

// Instantiate the application.
$app = JFactory::getApplication('site');

/// -------------- End Joomla

include("register/dbconnect.php"); conndb();
include("register/function.php");


//print_r($_SESSION);
$user =& JFactory::getUser(); // GetUser
//echo $user->name;

// ----- Authentication
$groupuser =  selectsql($dbname,"SELECT * FROM mrst_user_usergroup_map where user_id = '".$user->id."' ","group_id");

//ปิดไว้วันอบรมดันใช้ที่ รร ไม่ได้---if($groupuser == "8" || $groupuser == "3" || $groupuser == "4"){ // 8 Super User / 3 เหรัญญิก / 4 ผู้ดูแลข่าวสาร

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>การประชุม สมาคมเวชสถิติแห่งประเทศไทย ประจำปี 2560</title>
<link href="admregis/mystyle.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="register/stype_bykorn.css" />
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
<?php

include_once "sb-admin-2/index.php";
include_once "admregis/script.php";
include_once "admregis/oop.php";
include("admregis/jquery/fancybox/include.html");
?>
<div id="main">

<?php include_once "admregis/NaviTop.php"; ?>
<img src="admregis/images/head_meeting2560.jpg" />


<div id="content">
<?php

switch($_GET['page']){

	case adm_regismain:
		echo "<div id='recent-news'>";
		include("register/adminview.php");
		echo "</div>";
	break;

	case regis:
		include("register/regis.php");
	break;

	case editregis:
		include("register/editregis.php");
	break;
	
	case viewbilllist:
		include("register/admview_billlist.php");
	break;

	case printalllist:
		include("register/admprint_alllist.php");
	break;
	
}

?>
</div><!-- End content -->

<div id="content3">
	<?php include_once "admregis/Footer.php"; ?>
</div>
</div> <!-- End Main -->

</body>
</html>
<?php
//}else{echo "No Access";}
?>