<?php
$img = $PHP->QRCode("test555");
$PHP->Mail("Subject",'ทดสอบการส่งเมลล์ด้วย phpmailer by gmail<br><img src="../images/head_meeting2560.jpg">'.$img.'',"korn.tcc46@gmail.com");
echo $img;
?>