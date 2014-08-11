$(document).ready(function(){
$.post("ajax.php",{mode: "query_level_node"},
	function(response){
		var json = $.parseJSON(response);
		json = $.map(json,function(value,index){return[value]});
		var num_json = json.length ;
		for(i=0;i<num_json;i++)
		{
			$(".skill").append("<div id='"+json[i]+"' class='skill_tree' value='"+json[i]+"'>level:"+json[i]+"<form id='quiz"+json[i]+"' action='exam_item.php' method='post' name='quiz_form'><input type='hidden' name='level_node' value='"+json[i]+"' /></form></div>");
			//$("#"+json[i][0]).append("<div id='percent_div' value='"+json[i][1]+"'>"+json[i][1]+"%</div>");
		}
	}
);
});

