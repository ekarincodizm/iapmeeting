<?
ob_start();
session_start();
include("../register/dbconnect.php"); conndb();
include("../register/function.php");
if($_POST[pword] != ""){
$_SESSION["pword"] = $_POST[pword];
}
if($_GET[logout] == "true"){
	unset($_SESSION["pword"]);
	session_write_close();
	echo "
			<script language='javascript'>
			location.href='index2.php?page=iopadm';
			</script>";
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>การประชุมฟื้นฟูวิชาการพยาธิวิทยากายวิภาค ครั้งที่ 11</title>
<link href="mystyle.css" rel="stylesheet" type="text/css" media="all" />
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

include_once "../sb-admin-2/index.php";
include_once "script.php";
include("jquery/fancybox/include.html");
?>
<div id="main">

<?php include_once "NaviTop.php"; ?>
<img src="images/NameWeb11.jpg" />


<div id="content">
<?php

switch($_GET[page]){

	case iopadm:
		echo "<div id='recent-news'>";
		include("../register/adminview.php");
		echo "</div>";
	break;

		case regis:
		include("../register/regis.php");
	break;
	
	case regispresent:
		include("../register/regispresent.php");
	break;

	case presentfile:
		include("presentfile.php");
	break;
	
	case printform:
		include("../register/print.php");
	break;
	
	case contactus:
		include("contactus.php");
	break;
	
	case gallery:
		include("gallery.php");
	break;

	case mailnosuccess:
		include("../register/mail.php");
	break;

	case presentname:
		include("register/PresentName.php");
	break;
}

?>
</div><!-- End content -->

<div id="content3">
	<?php include_once "Footer.php"; ?>
</div>
</div> <!-- End Main -->

</body>
</html>
