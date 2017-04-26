<?php
echo "<h3>Email ของผู้ที่ยังไม่ได้ชำระค่าลงทะเบียน การประชุมครั้งที่ ".$th."</h3>";
echo "<hr><br>";
$sql_mail = "SELECT reg_id,reg_name,reg_email FROM mtregis_main WHERE reg_th = '".$th."' AND reg_status = 'r' AND reg_email NOT IN ('','-')";
$db_query_mail=mysql_db_query($dbname,$sql_mail);
while($record_mail=mysql_fetch_array($db_query_mail)) {
echo $record_mail['reg_email'];
echo ",";
}
?>