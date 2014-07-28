<?php
function insert_exam_record($member_id,$level,$question,$correct)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "INSERT INTO `exam_record`(`member_id`,`level`,`question`,`correct`) VALUE('$member_id','$level','$question','$correct')";
	$result = $db->query($query);
	return $result;
}
function modify_exam_leave($empty_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "UPDATE `exam_record` SET `student`= 'null' WHERE `id`='$empty_id'";
	$result = $db->query($query);
	return true;
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
?>