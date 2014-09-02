<?php
function insert_exam_record($member_id,$level,$correct,$exam_id,$level_node)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "INSERT INTO `exam_record`(`member_id`,`level`,`correct`,`exam_id`,`level_node`,`date`) VALUE('$member_id','$level','$correct','$exam_id','$level_node',CURDATE())";
	$result = $db->query($query);
	//return true;
}
function insert_exam_log($member_id,$level,$exam_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "INSERT INTO `exam_log`(`member_id`,`level`,`exam_id`) VALUE('$member_id','$level','$exam_id')";
	$result = $db->query($query);
	//return true;
}
function modify_exam_leave($empty_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "UPDATE `exam_record` SET `student`= 'null' WHERE `id`='$empty_id'";
	$result = $db->query($query);
	//return true;
}
function modify_exam_log_leave($empty_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "UPDATE `exam_log` SET `correct_percent`= '0' WHERE `id`='$empty_id'";
	$result = $db->query($query);
	//return true;
}
function modify_exam_record($empty_id,$student_answer,$state)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "UPDATE `exam_record` SET `student`='$student_answer',`state`='$state' WHERE `id`='$empty_id'";
	$result = $db->query($query);
	//return true;
}
function progress_record($member_id,$level,$progess)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "UPDATE `progress_record` SET `progress`='$progess' WHERE `member_id`='$member_id' AND `level`='$level'";
	$result = $db->query($query);
	//return true;
}
function insert_exam_id_exam_percent($exam_log_id,$correct_percent)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "UPDATE `exam_log` SET `correct_percent`='$correct_percent' WHERE `id`='$exam_log_id'";
	$result = $db->query($query);
	//return true;
}
function insert_state_xp($member_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "INSERT INTO `state`(`member_id`,`date`) VALUE('$member_id',NOW())";
	$result = $db->query($query);
	//return true;
}
function update_state_xp($xp,$member_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "UPDATE `state` SET `xp`='$xp',`date`=NOW() WHERE `member_id`='$member_id'";
	$result = $db->query($query);
	//return true;
}
function update_state_p_level($p_level,$member_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "UPDATE `state` SET `p_level`='$p_level' WHERE `member_id`='$member_id'";
	$result = $db->query($query);
	//return true;
}
?>