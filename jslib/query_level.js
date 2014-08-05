$(document).ready(function(){
$.post("ajax.php",{mode: "query_level"},
	function(response){
		var json = $.parseJSON(response);
		json = $.map(json,function(value,index){return[value]});
		var num_json = json.length ;
		for(i=0;i<num_json;i++)
		{
			$(".skill").append("<div id='"+json[i]+"' class='skill_tree' value='"+json[i]+"'>"+json[i]+"<form id='quiz"+json[i]+"' action='exam.php' method='post' name='quiz_form'><input type='hidden' name='level' value='"+json[i]+"' /><input type='hidden' name='total_exam_quiz' value='3' /></form></div>");
			//$("#"+json[i][0]).append("<div id='percent_div' value='"+json[i][1]+"'>"+json[i][1]+"%</div>");
		}
	}
);
});

