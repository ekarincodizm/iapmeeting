<?php
session_start();
?>
<!-- <script type="text/javascript" src="plugin/captchastylish99/jquery-1.2.6.min.js"></script> -->
<script>

$(document).ready(function() { 

	 $('#Send').click(function() {  
	 	
		
		
			$.post("../plugin/captchastylish99/post.php?"+$("#formID").serialize(), {
		
			}, function(response){
			
			if(response==1)
			{
				$("#after_submit").html('');
				//$("#Send").after('<label class="success" id="after_submit">Your message has been submitted.</label>');
				$('#submit_handle').click();
			}
			else
			{
				$("#after_submit").html('');
				$("#Send").after('<div class="error" id="after_submit">*** invalid captcha code</div>');
			}
						
		});
				
		return false;
	 });
	 
	 // refresh captcha
	 $('img#refresh').click(function() {  
			
			change_captcha();
	 });
	 
	 function change_captcha()
	 {
	 	document.getElementById('captcha').src="../plugin/captchastylish99/get_captcha.php?rnd=" + Math.random();
	 }

});
 
 
 	
</script>		 

<style>

.error{ color:#CC0000; font-size:16px;  font-style:italic;}
.success{ color:#009900; font-size:16px; margin:4px; font-style:italic; width:200px;}

img#refresh{
	margin-left:4px;
	cursor:pointer;
}

label{ color:#666666; }

</style>
</head>



<!-- <form action="#" name="form1" id="form1">

	<div id="wrap" align="center">
		<img src="jquery/captchastylish99/get_captcha.php" alt="" id="captcha" />
		
		<br clear="all" />
		<input name="codecaptcha" type="text" id="codecaptcha">
	</div>
	<img src="jquery/captchastylish99/refresh.jpg" width="25" alt="" id="refresh" />
		
	<br clear="all" /><br clear="all" />
	<label>&nbsp;</label>
	<input value="Send" type="submit" id="Send">


</form> -->