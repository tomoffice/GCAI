<?php
function login_chk($account,$password,$db_password,$chk_account)
{	
	if(empty($account) == false)
	{	
	
		if(empty($password) ==false)
		{
		
			if($chk_account == true && $db_password == $password)
			{
					$_SESSION["login"] = true;
					$_SESSION["account"] = $account;
					$member_id	= get_member_id($account);
					$_SESSION["member_id"] = $member_id["id"];
					//var_dump($_SESSION);
					$state = "2"; //通過驗證
			}
			else
			{
			
				session_destroy();
				$state = "3"; //帳號密碼錯誤
			}
		}
		else
		{
			session_destroy();
			$state = "1"; //沒輸入密碼
		}
	}
	else
	{
		session_destroy();
		$state = "4"; //沒輸入帳號
	}
return $state;
}
function chk_login_state()
{	
	if($_SESSION["login"] != true)
	{
		return false;
	}
	elseif($_SESSION["login"] == true)
	{
		return true;
	}

}

?>