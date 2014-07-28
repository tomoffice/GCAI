<?php
session_start(); //for chk_login_state()
require("phplib/tool.lib.php"); //login_chk() chk_login_state()
require("phplib/mysql_select.lib.php");//chk_member_account() get_member_password()
require("phplib/quiz.lib.php");//process_exam_question()
require("phplib/mysql_insert.lib.php");//generate_quiz()
$mode = $_POST["mode"];
									//SESSION
//////////////////////////////////////////////////////////////////////////////////////
$member_id = $_SESSION['member_id'];
//////////////////////////////////////////////////////////////////////////////////////
	if($mode == "login")
	{	
		$account = $_POST["account"];
		$password = $_POST["password"];
		$chk_account=chk_member_account($account);//查詢資料庫是否有此帳號(true,false)
		$db_password = get_member_password($account);//取得資料庫帳號的密碼
		$state = login_chk($account,$password,$db_password,$chk_account);//比對帳號與密碼並給予分類(0,1,2,3)
		echo $state;//將分類值提交給前端判斷顯示
		//echo "debug_point";
		//echo $db_password;
	}
	elseif($mode == "login_session_chk")
	{
		$state = chk_login_state();//使用後端session確認是否有登入
		echo $state;
	}
	elseif($mode == "user_leave")
	{
		$data = empty_paper();
		echo $data;
	}
	elseif($mode == "student_answer")
	{
		$student_answer = $_POST["student_answer"];
		$correct = $_POST["correct"];
		mark_paper($student_answer,$correct); 
	}
	 elseif($mode == "leaderboard_item")
	{	
		$personal_level = query_personal_level($member_id);
		$num_personal_level = count($personal_level);
		for($i=0;$i<$num_personal_level;$i++)
		{
			$num_right[$i][3] = $personal_level[$i];

		}
		echo json_encode($num_right);
		//var_dump($member_id);
	} 
	elseif($mode == "leaderboard_item")
	{	
		$personal_level = query_personal_level($member_id);
		$num_personal_level = count($personal_level);
		for($i=0;$i<$num_personal_level;$i++)
		{
			$num_right[$i] = $personal_level[$i];
			
		}
	}
	elseif($mode == "query_level")
	{	
		$level = query_level();
		$num_level = count($level);
		for($i=0;$i<$num_level;$i++)
		{
			$data[$i][0] = $level[$i]["level"];
		}
		$data = json_encode($data);
		//$data = query_level_percent($member_id);
		echo $data;
	}
?> 
