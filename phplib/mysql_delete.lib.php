<?php
function delete_exam_record($member_id,$level,$exam_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "DELETE FROM `exam_record` WHERE `member_id`='$member_id' AND `level`='$level' AND `exam_id`='$exam_id'";
	$result = $db->query($query);
	if(! $result )
	{
		die('Could not delete data: ' . mysql_error());
	}
	echo "Deleted data successfully\n";
	$db->close();
}
function delete_exam_log($member_id,$level,$exam_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "DELETE FROM `exam_log` WHERE `member_id`='$member_id' AND `level`='$level' AND `exam_id`='$exam_id'";
	$result = $db->query($query);
	if(! $result )
	{
		die('Could not delete data: ' . mysql_error());
	}
	echo "Deleted data successfully\n";
	$db->close();
}














?>