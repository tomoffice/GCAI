<?php
require("phplib/tool.lib.php"); //login_chk() chk_login_state()
require("phplib/mysql_select.lib.php");//chk_member_account() get_member_password()
require("phplib/quiz.lib.php");//process_exam_question()
require("phplib/mysql_insert.lib.php");//generate_quiz()
//echo file_exists("phplib/mysql_insert.lib.php");

/* $member_id = 2;
$tmp = query_exam_id($member_id);
if($tmp == false)
{	
	$exam_id = 1;
	insert_exam_log($member_id,$level,$exam_id);
}
else
{		
	$exam_id = $tmp+1;
	insert_exam_log($member_id,$level,$exam_id);		
} 	
var_dump($exam_id);
 */
		$level_node = query_level_node();
		$num_level_node = count($level_node);
		for($i=0;$i<$num_level_node;$i++)
		{
			$data[$i] = $level_node[$i]["level_node"];
		}
		var_dump($data);
?>