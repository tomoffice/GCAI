<?php
require ("phplib/mysql.lib.php");
require ("phplib/project.lib.php");
function get_all_member()
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT * FROM `member` WHERE 1";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{
		for($i=0;$i<$num_rows;$i++)
		
		{
			$data[$i] = $db->fetch_assoc();
		}
		$db->close();
		return $data;
	}
}

function get_member_password($account)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `password` FROM `member` WHERE `account`='$account'";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{
		for($i=0;$i<$num_rows;$i++)
		{
			$data[$i] = $db->fetch_assoc();
		}
		$db->close();
		return $data[0]["password"];
	}
}

function chk_member_account($account)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT * FROM `member` WHERE `account`='$account'";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		$db->close();
		return true;
	}
	//var_dump($num_rows);
}
function get_lesson_level($level)
{

	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT * FROM word WHERE level='$level'";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{
		for($i=0;$i<$num_rows;$i++)
		{
			$data[$i] = $db->fetch_assoc();
		}
		$db->close();
		return $data;
	}
}
function select_lesson_level($level,$num_item_in_quiz,$total_exam_quiz)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT * FROM word WHERE level='$level' ORDER by RAND()";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data[$i] = $db->fetch_assoc();
		}
			
			$db->close();
			return $data;
			//return $data;
	}
}
function get_member_id($account)
{
$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `id` FROM `member` WHERE `account` = '$account'";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
			$data = $db->fetch_assoc();
			
			$db->close();
			return $data;
			//return $data;
	}
}
function get_studnet_emypty_id()
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `id` FROM `exam_record` WHERE `student` IS NULL";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data[$i] = $db->fetch_assoc();
		}
			
			$db->close();
			return $data;
			//return $data;
	}
}
function leaderboard($member_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT COUNT(*) AS `total_correct` FROM `exam_record` WHERE `state` = 'right' AND `member_id`='$member_id'";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data = $db->fetch_assoc();
		}
			
			$db->close();
			return $data;
			//return $data;
	}
}
function get_level_member($level)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT distinct `member_id`,`name` FROM `exam_record`,`member` where `exam_record`.`member_id`=`member`.`id` AND `level`='$level'";
	//$query = "SELECT A1.member_id AS member_id, COUNT( A1.state =  'right' AND  `level` =  '$level' ) AS  'right' FROM exam_record AS A1 GROUP BY A1.member_id";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data[$i] = $db->fetch_assoc();
		}
			
		$db->close();
		return $data;
		//return $data;
	}
}
function get_exam_right_num($level,$member_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT distinct `member_id`,`name`,(SELECT count(*) FROM `exam_record`,`member` where `exam_record`.`member_id`=`member`.`id` AND `level`='1' AND `member_id`='2' AND `state`='right') AS `state_num`  FROM `exam_record`,`member` where `exam_record`.`member_id`=`member`.`id` AND `level`='$level' AND `member_id`='$member_id' AND `state`='right'";
	//$query = "SELECT A1.member_id AS member_id, COUNT( A1.state =  'right' AND  `level` =  '$level' ) AS  'right' FROM exam_record AS A1 GROUP BY A1.member_id";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data[$i] = $db->fetch_assoc();
		}
			
		$db->close();
		return $data;
		//return $data;
	}

}
function get_member_account($member_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `account` FROM `member` where `id`='$member_id'";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data = $db->fetch_assoc();
		}			
			$db->close();
			return $data;
			//return $data;
	}
}
function query_level()
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `level` FROM `word` GROUP BY `level`";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data[$i] = $db->fetch_assoc();
		}			
			$db->close();
			return $data;
			//return $data;
	}
}
function query_personal_level($member_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT distinct `level` FROM `exam_record` WHERE `member_id`='$member_id'";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data[$i] = $db->fetch_assoc();
		}			
			$db->close();
			return $data;
			//return $data;
	}
}
function query_level_num($member_id,$level)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT COUNT(*) AS `total_quiz` FROM `exam_record` WHERE `member_id` = '$member_id' AND `level` = '$level'";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data = $db->fetch_assoc();
		}			
			$db->close();
			return $data;
			//return $data;
	}
}
function query_level_num_right($member_id,$level)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT COUNT(*) AS `total_right` FROM `exam_record` WHERE `member_id` = '$member_id' AND `level` = '$level' AND `state` = 'right'";
	$result = $db->query($query);
	$num_rows = $db->row_size();
	if($num_rows==0)
	{
		$db->close();
		return false;
	}
	else
	{	
		for($i=0;$i<$num_rows;$i++)
		{
			$data = $db->fetch_assoc();
		}			
			$db->close();
			return $data;
			//return $data;
	}
}
?>