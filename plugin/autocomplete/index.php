<?php
include_once 'connect.php';
$sql = "select * from rm_main where  rm_depotherevent != '' group by rm_depotherevent  order by rm_depotherevent ASC";
$query = mysql_query($sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>itoffside.com::AJAX</title>
        <link type="text/css" rel="stylesheet" href="jquery.autocomplete.css" />
        <script type="text/javascript" src="jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="jquery.autocomplete.js"></script>
        <script type="text/javascript">
            var states = [
<?php
$province = "";
while ($result = mysql_fetch_array($query)) {
    $province .= "'" . $result['rm_depotherevent'] . "',";
}
echo rtrim($province, ",");
?>
            ];
            $(function () {
                $("input").autocomplete({
                    source: [states]
					//,limit: 20
                });
$('#open').click(function(){
	$('#remote_input').trigger('updateContent.xdsoft');
	$('#remote_input').trigger('open.xdsoft');
	$('#remote_input').focus();
});
            });
        </script>
        <style>
            .xdsoft_autocomplete_dropdown{
                padding: 10px;
            }
        </style>
    </head>
    <body style="margin-top: 30px;margin-left: 40%;">
        <form name="searchform" action="#" method="POST">
            <input type="text" name="states" id="remote_input" value="" style="border: 1px solid #cccccc; height: 30px;width: 300px;padding: 5px;"/>
			<span class="input-group-btn">
				<button id="open" class="btn btn-default" type="button"><span class="caret"></span></button>
			</span>
        </form>
    </body>
</html>
