$(document).ready(function (){
	
	$("#login_btn").click(function(){
		$.post("ajax.php",{mode: "login", account: $('#account').val(), password: $('#password').val()},
			function(response)
			{
				if(response == 4)
				{
					$("#login_state").html("沒輸入帳號");
					$("#password").val("");
				}
				else if(response == 1)
				{
					$("#login_state").html("沒輸入密碼");
					$("#account").val("");
				}
				else if(response == 2)
				{
					$("#login_state").html("即將進入遊戲頁面");
					window.location.href ='./main.php'; 
				}
				else if(response == 3)
				{
					$("#login_state").html("帳號密碼錯誤");
					$("#password").val("");
				}
			
			}
		);
	}); 
}); 