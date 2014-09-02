<?php
$level_node = $_POST["level_node"];
$json_level_node = json_encode($level_node);
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<link type="text/css" rel="stylesheet" href="css/exam_item.css">
<script src="jquery/jquery-1.7.js"></script>
<script type="text/javascript">
	json_level_node = <?php echo $json_level_node?>;//變成全域變數
	$(document).ready(function(){
		$.post("ajax.php",{mode: "query_level" ,level_node: json_level_node},
			function(response){
				var json = $.parseJSON(response);
				var num_level_node = json.length;
				for(i=0;i<num_level_node;i++)
				{
					$("#level").append("<div value='"+json[i]+"' style='display:inline-block; border:1px solid #000; height:60px; width:100px;'>"+json[i]+"<form id='quiz"+json[i]+"' action='exam.php' method='post' name='quiz_form'><input type='hidden' name='level' value='"+json[i]+"' /> <input type='hidden' name='level_node' value='"+json_level_node+"' /></form></div>");
				}
			}
		);
	});
	$(".content #level>div").live("click",function(){
		$("#quiz"+$(this).attr('value')).submit();
	});
</script>
</head>
<body>
<div id="head">head</div>
<div id="main">main
	<div class="content">
		<div id='level'></div>
	</div>
</div>
</body> 
</html> 