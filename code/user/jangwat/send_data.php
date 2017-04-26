<?
include "dbconfig.php";
conndb();

$province_id = $_POST['province'];
$amphur_id = $_POST['amphur'];
$district_id = $_POST['district'];

$strSQL1 = "SELECT * FROM province WHERE PROVINCE_ID = '$province_id'";
$result1 = mysql_query($strSQL1);
$row1 = mysql_fetch_array($result1);
$province_name = $row1['PROVINCE_NAME'];


$strSQL2 = "SELECT * FROM amphur WHERE AMPHUR_ID = '$amphur_id'";
$result2 = mysql_query($strSQL2);
$row2 = mysql_fetch_array($result2);
$amphur_name = $row2['AMPHUR_NAME'];


$strSQL3 = "SELECT * FROM district WHERE DISTRICT_ID = '$district_id'";
$result3 = mysql_query($strSQL3);
$row3 = mysql_fetch_array($result3);
$district_name = $row3['DISTRICT_NAME'];

?>


<html>
<head>
<title>:: ตัวอย่าง ทำ AJAX ของ Drop Down Menu ที่ไว้เลือกจังหวัด อำเภอ ตำบล ของไทย ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>


<body>

จังหวัด : <? echo $province_name." (".$province_id.")"; ?><br>
อำเภอ : <? echo $amphur_name." (".$amphur_id.")"; ?><br>
ตำบล : <? echo $district_name." (".$district_id.")"; ?>

<br><br>
* จะได้รหัสของ จังหวัด เมือง ตำบล ออกมา (ตามหลักการออกแบบฐานข้อมูล ที่ควรจะเก็บแค่ ID น่ะ) ซึ่งสามารถนำไปเก็บลงตารางฐานข้อมูลได้เลย *
<br>* กรณีต้องการให้แสดงชื่อออกมาก็ให้ไป SELECT ชื่อมาจากตาราง amphur , district , province  อีกทีครับ *


<br><br><br>พัฒนาโดย : <a href="http://php-ajax-code.blogspot.com" target="_blank">http://php-ajax-code.blogspot.com</a>
<br>แก้ไขพัฒนาเพิ่มเติมให้สมบูรณ์แบบโดย : <a href="http://www.codetukyang.com" target="_blank">http://www.codetukyang.com</a>
<br>สร้าง & พัฒนาฐานข้อมูล จังหวัด อำเภอ ตำบล โดย : <a href="http://www.thaicreate.com" target="_blank">http://www.thaicreate.com</a>


</body>

</html>