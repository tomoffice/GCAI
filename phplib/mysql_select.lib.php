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
function select_lesson_level($level,$word_num)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT * FROM word WHERE level='$level' ORDER by RAND() LIMIT $word_num";
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
function select_total_exam_quiz($level)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT ROUND(COUNT(*)/4) AS `total_exam_quiz` FROM `word` WHERE `level`='$level'";
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
function get_studnet_emypty_id($exam_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `id`,`member_id` FROM `exam_record` WHERE `student` IS NULL AND `exam_id` = '$exam_id'";
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
function get_leave_id()
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `id`,`member_id` FROM `exam_record` WHERE `student` IS NULL";
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
function get_exam_right_num($level)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `account`,COUNT(*) AS `state_num` FROM `exam_record`,`member` WHERE `exam_record`.`member_id` = `member`.`id` AND `state`='right' AND `level`='$level' GROUP BY `member_id` ORDER BY `state_num` DESC LIMIT 3";
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
function query_level($level_node)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `level` FROM `word` WHERE `level_node`='$level_node' GROUP BY `level`";
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
function query_level_node()
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `level_node` FROM `word` GROUP BY `level_node`";
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
function query_exam_id_num($member_id,$exam_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT COUNT(*) AS `total_quiz` FROM `exam_record` WHERE `member_id` = '$member_id' AND `exam_id` = '$exam_id'";
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
function query_exam_id_num_right($member_id,$exam_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT COUNT(*) AS `total_right` FROM `exam_record` WHERE `member_id` = '$member_id' AND `exam_id` = '$exam_id' AND `state` = 'right'";
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
function query_quiz_member_id($level)
{

	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT distinct `member_id` FROM exam_record WHERE `level`='$level'";
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
function query_exam_id($member_id)//找出最大的exam_id 每次把exam_id+1當作一次考試
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT MAX(`exam_id`) AS `max_exam_id` FROM `exam_log` WHERE `member_id`='$member_id'";
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
		if(empty($data["max_exam_id"])== true)
		{
			return false ;
		}
		else
		{
			return $data["max_exam_id"];
		}
	}
}
function query_exam_log_id($member_id,$exam_id)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `id` FROM `exam_log` WHERE `member_id`='$member_id' AND `exam_id`='$exam_id'";
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
function query_exam_log_empty()
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `id` FROM `exam_log` WHERE `correct_percent` IS NULL";
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
//SELECT count(*) AS `pass_num` FROM exam_log WHERE `member_id`='2' AND `level`='1';
function query_exam_num($member_id,$level,$level_conf)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT COUNT(*) AS `pass_num` FROM `exam_log` WHERE `member_id`='$member_id' AND `level`='$level' AND `correct_percent` > (SELECT `pass_num` FROM `exam_conf` WHERE `level`='$level_conf')";
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
function query_exam_conf_pass_limit($level_conf)
{
	$db = new MYSQL_DB(db_host, db, db_user, db_passwd);
	$db->connect();
	$query = "SELECT `level_limit` FROM `exam_conf` WHERE `level`='$level_conf'";
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