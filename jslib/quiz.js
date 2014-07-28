function()
	$.post("ajax.php",{mode: "show_quiz",state: "ture"},
		function(json_data){
		
			
			alert(json_data);
		
		
		},"json"
	);
	alert(location.search);
});