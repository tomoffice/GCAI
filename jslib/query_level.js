$(document).ready(function(){
$.post("ajax.php",{mode: "query_level"},
	function(response){
		var json = $.parseJSON(response);
		var num_json = json.length ;
		for(i=0;i<num_json;i++)
		{
			$(".skill").append("<div id='"+json[i][0]+"' class='skill_tree' value='"+json[i][0]+"'>"+json[i][0]+"<form id='quiz"+json[i][0]+"' action='exam.php' method='post' name='quiz_form'><input type='hidden' name='level' value='"+json[i][0]+"' /><input type='hidden' name='total_exam_quiz' value='3' /></form></div>");
			//$("#"+json[i][0]).append("<div id='percent_div' value='"+json[i][1]+"'>"+json[i][1]+"%</div>");
		}
	}
);
});

