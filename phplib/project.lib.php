<?php

/**
 * define global variable for New Dictionary database system
 *
 * Author: ChengHao Wang
 *
 * Since:  2007/06/10
 * 
 * Author: Frank
 *
 * Since:  2011/11/12
 *
 */
 
if (!defined('__PROJECT_GLOBAL__')) 
{
	define('__PROJECT_GLOBAL__', 1);
	
	// 設定系統 DEBUG 狀態	
	define("RELEASE", FALSE);
	
	if (RELEASE)
    	define("DEBUG", FALSE);
	else
    	define("DEBUG", TRUE);

	// define database name
	define("db", "gcai");
	define("db_host", "127.0.0.1");
	define("db_user", "root");
	define("db_passwd", "0955115526");
	
	// CSA define database name
	/*define("csa_db", "csaMCQ");
	define("csa_db_host", "127.0.0.1");
	define("csa_db_user", "root");
	define("csa_db_passwd", "acer28204688");
	*/
}	// end define global variable of Project 

?>
