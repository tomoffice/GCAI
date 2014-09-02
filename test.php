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
	/* 	$level_node = query_level_node();
		$num_level_node = count($level_node);
		for($i=0;$i<$num_level_node;$i++)
		{
			$data[$i] = $level_node[$i]["level_node"];
		}
		var_dump($data); */
		//$date=date("Y-m-d H:i:s"); 
		//echo $date;
		//$member_id=1;
		//var_dump(query_member_correct($member_id));
		echo 65%60;
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<script src="jquery/jquery-1.7.js"></script>
<script>
$(document).ready(function(){
function fdsa()
{
alert("123");
$("input[type=button]").show();

}
$("input[type=button]").hide();
$("input[type=radio]").on( "click", function() {
  alert( $( this ).text() );
});
//$("input[type=radio]").change(("click"),fdsa);

});
</script>
</head>
<body>
<form>
<input type='radio' name='gg' id='cc' value='cc'>
<input type='radio' name='gg' id='ll' value='ll'>
</form>
<input type='button' value='go'/>
</body>
</html>






SELECT date_format( `date`, '%a' ) AS weekday, WEEK(`date`) AS week_number,sum(`currect`) AS `num_currect` FROM `exam_record` WHERE `date` >= date_add( now( ) , INTERVAL -83 DAY ) GROUP BY WEEK(`date`), DAY(`date`)












