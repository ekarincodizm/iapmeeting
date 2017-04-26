<script language="JavaScript" type="text/JavaScript">
function ClearText(ControlName){
	eval("document."+ControlName+".value='';");  
}

function popUpSearch1(src) {
		var w = screen.availWidth;
		var h = screen.availHeight;
		var popW = 500, popH = 450;
		var leftPos = (w-popW)/2, topPos = (h-popH)/2;
			window.open(src, 'poppage', 'toolbars=0, scrollbars=yes, location=0, statusbars=yes, menubars=0, resizable=0, width='+popW+', height='+popH+', left ='+leftPos+', top ='+topPos);
}

function fncSubmit()
{

		document.frm.submit();
}
</script>
<script type="text/javascript"> //สคลิปเปิด popup หน้าใหม่
function popup(url,name,windowWidth,windowHeight){    
	myleft=(screen.width)?(screen.width-windowWidth)/2:100;	
	mytop=(screen.height)?(screen.height-windowHeight)/2:100;	
	properties = "width="+windowWidth+",height="+windowHeight;
	// เต็มจอ properties = "fullscreen"; //
	properties +=",scrollbars=yes,menubar=yes, top="+mytop+",left="+myleft;   
	window.open(url,name,properties);
}
</script>

<script language="JavaScript" type="text/JavaScript">
function ClearText(ControlName){
	eval("document."+ControlName+".value='';");  
}
</SCRIPT>

<SCRIPT language="JavaScript">
<!--   
  function Conf(object) {
  if (confirm("คุณต้องการลบข้อมูลใช่หรือไม่") == true) {
  return true;
  }
  return false;
  }
//-->
</SCRIPT>