$(document).ready(function(){
	var x = 0;
	if(x == 0)
	{
		$.post("ajax.php",{mode:"leaderboard_level"},
			function(response){
				var json = $.parseJSON(response);
				$("#right_top").append("<div id='leaderboard_div'></div>")
				for(i=0;i<json["level"].length;i++)
				{	
					$("#leaderboard_div").append("<div id='level_div"+json['level'][i]["level"]+"' value='"+json['level'][i]["level"]+"'>level"+json['level'][i]["level"]+"</div>");
					var num_json_level_item = json["level_item"][i].length;
					for(j=0;j<num_json_level_item;j++)
					{
						$("#level_div"+(i+1)).append("<div>"+(j+1)+"."+json["level_item"][i][j]['account']+": "+json["level_item"][i][j]['state_num']+"</div>");
					} 
				}
			}
		);
		x++;
	}
	setInterval(function(){	
		$("#leaderboard_div").empty()
		$.post("ajax.php",{mode:"leaderboard_level"},
			function(response){
				var json = $.parseJSON(response);
				$("#right_top").append("<div id='leaderboard_div'></div>")
				for(i=0;i<json["level"].length;i++)
				{	
					$("#leaderboard_div").append("<div id='level_div"+json['level'][i]["level"]+"' value='"+json['level'][i]["level"]+"'>level"+json['level'][i]["level"]+"</div>");
					var num_json_level_item = json["level_item"][i].length;
					for(j=0;j<num_json_level_item;j++)
					{
						$("#level_div"+(i+1)).append("<div>"+(j+1)+"."+json["level_item"][i][j]['account']+": "+json["level_item"][i][j]['state_num']+"</div>");
					} 
				}
			}
		);
	},5000);
});


