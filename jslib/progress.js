
$(document).ready(function(){


	$.post("ajax.php",{mode: "p_level"},
		function(response){
			var json = $.parseJSON(response);
			$("#state span.glyphicon.glyphicon-chevron-up").text("Level:"+json[0]);
			$("#state span.glyphicon.glyphicon-star").text("Xp:"+json[1]);
			$("div.progress-bar").attr("style","width:"+(json[2]/60)*100+"%").text(json[2]+"/60");
		}
	);
	$.post("ajax.php",{mode: "learn_progress"},
		function(response){
			var json = $.parseJSON(response);
			var num_json = json.length;
			var date = ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"];
			var myDataValues = Array();
			var testdata = new Array();
			var testdata1 = new Array();
			var a = 0;
			
			for(i=0;i<7;i++)
			{
				if(num_json > a)
				{
					if(json[a]["weekday"] == date[i])	
					{
						testdata[i] = json[a]['num_currect'];
						a++;
					}
					else
					{	
						testdata[i] = 0;
					}
				}
				else
				{
					testdata[i] = 0;
				}
			} 

			var newstr = '[' + testdata.join(', ') + ']';
			$(function () {
				$('#container').highcharts({
					title: {
						text: '本周進度',
						x: -20 //center
					},
					subtitle: {
						text: 'weekly xp',
						x: -20
					},
					xAxis: {
						categories:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"]
					},
					yAxis: {
						title: {
							text: ''
						}, 
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}],
						min: 0
					},
					tooltip: {
						valueSuffix: 'XP'
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'middle',
						borderWidth: 0
					},
					series: [{
						name: 'XP',
						data: eval(newstr)
					}]
				});
			});
		}
	);	
});
