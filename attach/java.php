		<script language="JavaScript">

			function addCommas(nStr)
			{
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + ',' + '$2');
				}
				return x1 + x2;
			}

			function chkNum(ele)
			{
				var num = parseFloat(ele.value);
				ele.value = addCommas(num.toFixed(2));
			}
		</script>

<script>
		$(function(){
				$(".deleteItem").live("click",function(event){
				
				event.preventDefault();
				var VVActionLink = $(this).attr("ActionLink");
				var VVDelID = $(this).attr("DelID");
						
				if(confirm("ต้องการจะลบข้อมูลนี้ใช่หรือไม่!")){
					$(this).parent("td").parent("tr").fadeOut("slow");
					$.post ("index.php?p=Backend/QuerySQL.php",  
						{RecordID : VVDelID , action : VVActionLink},
							function (data) { 
								$("#Show").html(data);
				});

				}
				
			});
		});
</script>
