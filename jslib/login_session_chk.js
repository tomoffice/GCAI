$(document).ready(function(){
	$.post("ajax.php",{mode: "login_session_chk"},
		function(response){
			if(response != true)
			{	
				alert("You don't have permission, please login!");
				window.location.href ='./index.php';
			}
			else
			{
				//alert("you're login !!!");
			}
		}
	);
});