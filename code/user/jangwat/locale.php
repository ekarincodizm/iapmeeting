<?
header("content-type: text/html; charset=utf-8");
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");

include "../dbconnect.php";
conndb();
          
$data = $_GET['data'];
$val = $_GET['val'];


     if ($data=='province') { 
          echo "<select name='province' onChange=\"dochange('amphur', this.value)\">\n";
          echo "<option value='0'>==== เลือกจังหวัด ====</option>\n";
          $result=mysql_db_query($dbname,"select * from regis_province order by PROVINCE_NAME");
          while($row = mysql_fetch_array($result)){
               echo "<option value=\"$row[PROVINCE_ID]\" >$row[PROVINCE_NAME]</option> \n" ;
          }
     } else if ($data=='amphur') {
          echo "<select name='amphur' onChange=\"dochange('district', this.value)\">\n";
          echo "<option value='0'>========= เลือกอำเภอ =========</option>\n";                             
          $result=mysql_db_query($dbname,"SELECT * FROM regis_amphur WHERE PROVINCE_ID= '$val' ORDER BY AMPHUR_NAME");
          while($row = mysql_fetch_array($result)){
               echo "<option value=\"$row[AMPHUR_ID]\" >$row[AMPHUR_NAME]</option> \n" ;
          }
     } else if ($data=='district') {
          echo "<select name='district'>\n";
          echo "<option value='0'>========= เลือกตำบล =========</option>\n";
          $result=mysql_db_query($dbname,"SELECT * FROM regis_district WHERE AMPHUR_ID= '$val' ORDER BY DISTRICT_NAME");
          while($row = mysql_fetch_array($result)){
               echo "<option value=\"$row[DISTRICT_ID]\" >$row[DISTRICT_NAME]</option> \n" ;
          }
     }
     echo "</select>\n";

echo mysql_error();
closedb();

?>