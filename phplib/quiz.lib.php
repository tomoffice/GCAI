<?php

function process_exam_question($total_exam_quiz,$level)
{	
	if(empty($total_exam_quiz) == false)
	{
		if(empty($level) == false)
		{
			$num_word = count(get_lesson_level($level));
			//$num_item_in_quiz = floor($num_word/$total_exam_quiz);//2014/8/3
			$num_item_in_quiz = 4;
			$total_exam_quiz = 1;
			//$total_exam_quiz = floor($num_word/$num_item_in_quiz);//2014/8/5
			$word_num = $num_item_in_quiz*$total_exam_quiz;
			if($num_word<$total_exam_quiz)//12(資料庫有幾個單字)$num_word/3(實際可出題數)$total_exam_quiz=4(一題裡的有幾個選項)$num_item_in_quiz
			{
				echo 0;//實際可出題數太多無法出題
			}
			else
			{
				if(select_lesson_level($level,$word_num) == false)
				{
					echo 1;//資料庫有問題
				}
				else
				{
					$quiz = select_lesson_level($level,$word_num);//mysql_select.lib.php
					$data = array();
					$a = 0;
					for($i=0;$i<$total_exam_quiz;$i++)
					{
						$data[$i] = array();
						for($j=0;$j<$num_item_in_quiz;$j++)
						{						
							$data[$i][$j] = $quiz[$a];
							$a++;
						}
					}
					return $data;
				}
			}
		}
		else
		{
			return 3;
		}
	}
	else
	{
		return 2;
	}
}
function generate_quiz($total_exam_quiz,$data,$member_id,$level,$exam_id,$level_node)
{
////////////////////////////////////////////////////////製造題目
/* if($tmp == false)
{	
	$exam_id = 1;
	insert_exam_log($member_id['id'],$level,$exam_id);
}
else
{		
	$exam_id = $tmp+1;
	insert_exam_log($member_id['id'],$level,$exam_id);		
}  */	
//insert_exam_log($member_id,$level,$exam_id);
for($i=0;$i<$total_exam_quiz;$i++)
{
	$RandKey[$i] = array_rand($data[$i],1);
	//echo $data[$i][$RandKey[$i]]["word"]."<br>".$data[$i][$RandKey[$i]]["explanation"]."<br>".$data[$i][$RandKey[$i]]["id"]."<br>";
	$question[$i] = $data[$i][$RandKey[$i]]["word"]; //題目
	$correct[$i] = $data[$i][$RandKey[$i]]["explanation"]; //出題的答案
	//insert_exam_record($member_id,$level,$question[$i],$correct[$i],$exam_id,$level_node);
}
//$_SESSION["correct"] = $correct;
//$_SESSION["json_correct"] = json_encode($correct);
$data[0] = $question;
$data[1] = $correct;
return $data;
//return $correct;
////////////////////////////////////////////////////////製造題目
}
function mark_paper($student_answer,$correct,$exam_id)
{	
	if(count($student_answer) == count($correct))
	{
		$num_correct = count($correct);
		for($i=0;$i<$num_correct;$i++)
		{
			if($student_answer[$i] == $correct[$i])
			{
				$state[$i] = "right";
			}
			else
			{
				$state[$i] = "wrong";
			}
		}
/*		$empty_id = get_studnet_emypty_id($exam_id);
		$num_empty_id = count($empty_id);
 		if($empty_id != false)
		{
			for($j=0;$j<$num_empty_id;$j++)
			{
				modify_exam_record($empty_id[$j]["id"],$student_answer[$j],$state[$j]);
			}
//////////////////////////////////////////////////////////////////////////////////////////////////////////計算每次試題得答對率
			$member_id = $empty_id[0]["member_id"];
			$exam_log_id = query_exam_log_id($member_id,$exam_id);
			$total_quiz = query_exam_id_num($member_id,$exam_id);
			$total_right = query_exam_id_num_right($member_id,$exam_id);
			$total = (float)$total_quiz["total_quiz"];//總數
			$right = (float)$total_right["total_right"];//達對數
			if($right == 0)
			{	
				$correct_percent = 0;
				insert_exam_id_exam_percent($exam_log_id["id"],$correct_percent);//寫入答對率	
			}
			else
			{
				$correct_percent = round(($right/$total)*100);
				insert_exam_id_exam_percent($exam_log_id["id"],$correct_percent);//寫入答對率		
			}
///////////////////////////////////////////////////////////////////////////////////////////////////////// 

		} 	
		else
		{
			echo 2;
		}*/
		$json_data = json_encode($state[0])	;
			echo $json_data;
			//echo 1;
	}
	else
	{
		echo 3;
	}
}
function empty_paper()
{		
	$empty_id = get_leave_id();
	
	$num_empty_id = count($empty_id);
	if($empty_id != false)
	{
		for($j=0;$j<$num_empty_id;$j++)
		{
			modify_exam_leave($empty_id[$j]["id"]);
		}	
		$exam_log_empty = query_exam_log_empty();
		modify_exam_log_leave($exam_log_empty["id"]);
		echo "使用者離開判定答案為錯";		
	}
	else
	{
		echo "答案已記錄可以離開";
	}
}
function query_level_percent($member_id)
{
	$level = query_level();
	$num_level = count($level);
	$total_quiz_test = query_level_num($member_id,1);//30
	if( 0 != $total_quiz_test["total_quiz"])
	{
		for($i=0;$i<$num_level;$i++)
		{
			$total_quiz[$i] = query_level_num($member_id,$level[$i]["level"]);//30
			$total_right[$i] = query_level_num_right($member_id,$level[$i]["level"]);//25
			$total_quiz_float[$i] = (float)$total_quiz[$i]["total_quiz"];
			$total_right_float[$i] = (float)$total_right[$i]["total_right"];
			$correct_percent[$i] = round(($total_right_float[$i]/$total_quiz_float[$i])*100*1.4);
			$data[$i][1] = $correct_percent[$i];
			$data[$i][0] = $level[$i]["level"];
		}
		//var_dump($total_quiz_float);
		return json_encode($data);
	}
	else
	{
		for($i=0;$i<$num_level;$i++)
			{
				$data[$i][1] = 0;//$correct_percent[$i];
				$data[$i][0] = $level[$i]["level"];
			}
		return json_encode($data);
	}
	//return json_encode($data);
	//return query_level_num($member_id,$level[$i]["level"]);
}
?>