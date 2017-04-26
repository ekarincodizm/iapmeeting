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

<link href="admregis/mystyle.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="register/stype_bykorn.css" media="all" />
</head>
<body>
<?php
include_once "sb-admin-2/index.php";
include_once "admregis/script.php";
include_once "admregis/oop.php";
?>

<?php

include($_GET['page']);

?>

</body>
</html>
<?php
//}else{echo "No Access";}
?>