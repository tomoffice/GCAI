$(document).ready(function(){

	$.post("ajax.php",{mode:"leaderboard_content"},
		function(response){
			var json = $.parseJSON(response);
			//console.log(response);
			var num_json = json.length ;
			$("#right_top").append("<div id='leaderboard_div'></div>")
			for(i=0;i<num_json;i++)
			{	
				$("#leaderboard_div").append("<div id='level_div"+json[i][3]["level"]+"' value='"+json[i][3]["level"]+"'>level: "+json[i][3]["level"]+"</div>");
			}
		}
	);
	$.post("ajax.php",{mode:"leaderboard_item"},
			function(response){
				var json = $.parseJSON(response);
				var num_json = json.length ;
				$("#right_top").append("<div id='leaderboard_div'></div>")
				for(i=0;i<num_json;i++)
				{	
					$("#leaderboard_div").append("<div id='level_div"+json[i][3]["level"]+"' value='"+json[i][3]["level"]+"'>level: "+json[i][3]["level"]+"</div>");
				}
			}
		);



	/* var x = 0
	if(x==0)
	{
		$.post("ajax.php",{mode:"leaderboard"},
			function(response){
				var json = $.parseJSON(response);
				var num_json = json.length ;
				$("#right_top").append("<div id='leaderboard_div'></div>")
				for(i=0;i<num_json;i++)
				{
					$("#leaderboard_div").append(json[i][1]["account"]+":"+json[i][0]["total_correct"]+"<br>");
				}
				x++;
			}
		);
	}
		setInterval(function(){
			$.post("ajax.php",{mode:"leaderboard"},
				function(response){
					var json = $.parseJSON(response);
					var num_json = json.length ;
					$("#leaderboard_div").empty();
					for(i=0;i<num_json;i++)
					{
						$("#leaderboard_div").append(json[i][1]["account"]+":"+json[i][0]["total_correct"]+"<br>");
					}
				}
			);
		}, 5000);  */
	
	//$(".right").click(function(){
	//$("body").hide();
	
	
/* 		$.post("ajax.php",{mode: "lesson"},
			function(response){
				if(response == true)
				{	
					//window.location.href ='./exam.php?level='+$("#skill").attr("value")+'&total_exam_quiz=3'; 
					window.location.href ='./exam.php';	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////					
					$.post("ajax.php",{mode: "show_quiz",level: $("#skill").attr("value"),total_exam_quiz: "3"},
							function(response){
								
							}
					);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
					
				}
				else
				{
					alert("chk session");
				}
			}
		); */		
	//});
	 
});


