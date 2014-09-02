<?php
session_start(); //for chk_login_state()
require("phplib/tool.lib.php"); //login_chk() chk_login_state()
require("phplib/mysql_select.lib.php");//chk_member_account() get_member_password()
require("phplib/quiz.lib.php");//process_exam_question()
require("phplib/mysql_insert.lib.php");//generate_quiz()
require("phplib/mysql_delete.lib.php");//generate_quiz()
require("phplib/level_process.lib.php");
$mode = $_POST["mode"];
									//SESSION
//////////////////////////////////////////////////////////////////////////////////////
$session_member_id = $_SESSION['member_id'];
$account = $_SESSION["account"];
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
		$exam_id = $_POST["exam_id"];
		mark_paper($student_answer,$correct,$exam_id); 
	}
	/*  elseif($mode == "leaderboard_level_week")
	{	
		query_exam_record_week($level_node);
		$data["level"] = query_personal_level($session_member_id);
		for($i=0;$i<count($data["level"]);$i++)
		{
			$data["level_item"][$i]= get_exam_right_num($data["level"][$i]["level"]);
		}
		echo json_encode($data);
		//var_dump($data);		
	} 
	elseif($mode == "leaderboard_content")
	{	
		$level = $_POST["level"];
		$member_in_level = get_exam_right_num($level);
		echo json_encode($member_in_level);
		
		//var_dump($member_in_level);
	} */
	/* elseif($mode == "query_level")
	{	
		$level = query_level();
		$num_level = count($level);
		$level_conf = 1;//關卡難度條件 exam_conf
		$level_limit = query_exam_conf_pass_limit($level_conf);//第一關要過5提要80%以上才會顯示下一關題目
		for($i=0;$i<$num_level;$i++)
		{
			$pass_num[$i] = query_exam_num($member_id,$level[$i]["level"],$level_conf);
			if(empty($pass_num[$i]['pass_num']) == true)
			{
				$pass_num[$i]['pass_num'] = 0;
			}
			if($pass_num[$i]['pass_num'] >= $level_limit['level_limit'])
			{	
				$data[$i+1] = $level[$i+1]["level"];
			}
		}
		$data[0] = $level[0]["level"];
		$json_data = json_encode($data);
		//$data = query_level_percent($member_id);
		echo $json_data;
	} */
	elseif($mode == "query_level")
	{	
		$level_node = $_POST["level_node"];
		$level = query_level($level_node);
		//$_SESSION["level_node"] = $level_node;
		$num_level = count($level);
		for($i=0;$i<$num_level;$i++)
		{
			$data[$i] = $level[$i]['level'];
		}
		$json_data = json_encode($data);
		echo $json_data;
		//var_dump($level);
	}
	elseif($mode == "query_level_node")
	{
		$level_node = query_level_node();
		$num_level_node = count($level_node);
		for($i=0;$i<$num_level_node;$i++)
		{
			$data[$i] = $level_node[$i]["level_node"];
		}
		$json_data = json_encode($data);
		echo $json_data;
	}
	elseif($mode == "generate_quiz")
	{
		//$total_exam_quiz_tmp = select_total_exam_quiz($level);//單字/4(4個選擇項目) 搜尋可以出的題數
		//$total_exam_quiz = $total_exam_quiz_tmp["total_exam_quiz"];
		$level = $_POST["level"];
		$level_node = $_POST["level_node"];
		$total_exam_quiz = 1;
		$data = process_exam_question($total_exam_quiz,$level);
		$rand_quiz = generate_quiz($total_exam_quiz,$data,$session_member_id,$level,$exam_id,$level_node);
		$anser_data[0] = $data;
		$anser_data[1] = $rand_quiz;
		$json_data = json_encode($anser_data);
		echo $json_data;
	}
	elseif($mode == "insert_exam_record")
	{
		$member_id = $_POST["member_id"];
		$level = $_POST["level"];
		$correct = $_POST["correct"];
		$exam_id = $_POST["exam_id"];
		$level_node = $_POST["level_node"];
///////////////////////////////////////////////////////////////////////////////////////經驗值加總
		if(check_state_xp($member_id) == false)							////////////假如state沒有member紀錄
		{
			insert_state_xp($member_id);								////////////新增一筆memeber紀錄
			$xp = $correct;												////////////新增第一次答對紀錄
			update_state_xp($xp,$member_id);							////////////更新經驗紀錄
			level_process($member_id);									////////////更新個人等級紀錄
		}
		else
		{	
			$correct_in_db = query_member_correct($member_id);			////////////查詢之前member答對的紀錄
			$xp = $correct+$correct_in_db;								////////////以前答對紀錄加上本次考試紀錄
			update_state_xp($xp,$member_id);							////////////更新經驗紀錄
			level_process($member_id);									////////////更新個人等級紀錄
		}
///////////////////////////////////////////////////////////////////////////////////////		
		insert_exam_record($member_id,$level,$correct,$exam_id,$level_node); //////////新增一筆考試紀錄
		echo "提交完成";
	}
	elseif($mode == "learn_progress")
	{
		$data = query_exam_record_week($session_member_id);
		$json_data = json_encode($data);
		echo $json_data;
		//var_dump($data);
	}
	elseif($mode == "p_level")
	{
		$data[0] = query_state_p_level($session_member_id);
		$data[1] = query_state_xp($session_member_id);
		$data[2] = $data[1]%60;
		$json_data = json_encode($data);
		echo $json_data;
	
	}
?> 
