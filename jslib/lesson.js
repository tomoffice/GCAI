$(document).ready(function(){
	$(".skill .skill_tree ").live("click",function(){
		$("#quiz"+$(this).attr('value')).submit();
	$.post("ajax.php",{mode: "query_level"},
		function(response){
			
		}
	);
	
	});
});


