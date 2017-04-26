<?php
$classpage = "class='current_page_item'";
switch($_GET['p']){

	case "Backend/adminview":
		$classpage1 = $classpage;
	break;
	
	case "Backend/viewbilllist":
		$classpage2 = $classpage;
	break;
	
	case "Backend/printalllist":
		$classpage3 = $classpage;
	break;
	

}
?>
	<div id="header-wrapper">
		<div id="header">
			
          <div id="menu">
            <ul>
              
              <li <?php echo $classpage1; ?>><a href="adm.php?p=Backend/adminview" accesskey="3" title="">รายชื่อทั้งหมด</a></li>
			   <li <?php echo $classpage2; ?>><a href="adm.php?p=Backend/admview_billlist" accesskey="3" title="">รายการใบเสร็จ</a></li>
			    <li <?php echo $classpage3; ?>><a href="adm.php?p=Backend/admprint_alllistsign" accesskey="3" title="" target="_blank">พิมพ์ใบเซ็นต์ชื่อ</a></li>
				<li <?php echo $classpage4; ?>><a href="adm.php?p=Backend/admprint_alllist" accesskey="3" title="" target="_blank">พิมพ์รายชื่อ</a></li>
			 <!-- <li <?php echo $classpage3; ?>><a href="register/ExportExcel.php" accesskey="3" title="">Export To Excel</a></li> -->

            </ul>
		  </div>
		</div>
	</div>
	<div id="headtitle"></div>