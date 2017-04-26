<?php
echo "<h3>รายชื่อการนำเสนอผลงานทางวิชาการ การประชุมครั้งที่ ".$th."</h3>";
echo "<hr><br>";
$sql_mail = "SELECT * FROM mtregis_main WHERE reg_th = '".$th."' AND reg_present != ''  ORDER BY reg_id ASC";
$db_query_mail=mysql_db_query($dbname,$sql_mail);
while($record_mail=mysql_fetch_array($db_query_mail)) {

echo "<img src='register/fileupload/".$record_mail['reg_pic']."' width='150px'>";
echo "<br>";
echo "เจ้าของผลงาน : ".$record_mail['reg_name'];
echo "<br>";
echo "รูปแบบที่นำเสนอ : ".$record_mail['pre_process'];
echo "<br>";
echo "ชื่อผลงาน TH : ".$record_mail['pre_thname'];
echo "<br>";
echo "ชื่อผลงาน EN : ".$record_mail['pre_enname'];
echo "<br>";
echo "<hr>";
}
?>