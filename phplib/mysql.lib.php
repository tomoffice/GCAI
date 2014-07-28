<?php

/**
 * define MySQL Class 
 *
 * Author: ChengHao Wang
 *
 * Since:  2007/06/26
 * 
 *
 */
 
class MYSQL_DB
{
	public $conn;
	public $result;
	public $db_host;
	public $db;
	public $db_user;
	public $db_passwd;
	
	function __construct($db_host, $db, $db_user, $db_passwd) {
		$this->db_host = $db_host;
		$this->db = $db;
		$this->db_user = $db_user;
		$this->db_passwd = $db_passwd;
	}
	
	public function connect() {
		$retval = 0;
		$this->conn = mysql_connect($this->db_host, $this->db_user, $this->db_passwd)
			or exit ('Could not connect MySQL server' . $this->db_host);

		$retval = mysql_select_db($this->db, $this->conn);
		
		if (!$retval) {
			die ("Can't use " . $this->db . mysql_error());
		}
		
		mysql_query("SET CHARACTER SET 'utf8'", $this->conn);
	}
	
	public function query($query) {
		
		$this->result = mysql_query($query, $this->conn);
		
		return $this->result;
	}
	
	public function row_size() {
		return mysql_num_rows($this->result);
	}
	
	public function fetch_array() {
		return mysql_fetch_array($this->result);
	}
	
	public function fetch_assoc() {
		return mysql_fetch_assoc($this->result);
	}
	
	public function affected_rows() {
		return mysql_affected_rows($this->conn);
	}
	
	public function get_insert_id() {
		return mysql_insert_id($this->conn);
	}
		
	public function close() {
		mysql_close($this->conn);
	}

}
?>
