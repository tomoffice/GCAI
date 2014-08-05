<?php
session_start();
require("phplib/tool.lib.php"); //login_chk() chk_login_state()
require("phplib/mysql_select.lib.php");//chk_member_account() get_member_password()
require("phplib/quiz.lib.php");//process_exam_question()
require("phplib/mysql_insert.lib.php");//generate_quiz()
//echo $data[$i][$i]["word"]."<br>".$data[$i][$i]["id"]."<br>";
//echo $json_data;
//var_dump($_SESSION["json_quiz"]);
//var_dump($json_correct);
$level = $_POST["level"];
$account = $_SESSION["account"];
//$total_exam_quiz = $_POST["total_exam_quiz"];
$total_exam_quiz_tmp = select_total_exam_quiz($level);//單字/4(4個選擇項目) 搜尋可以出的題數
$total_exam_quiz = $total_exam_quiz_tmp["total_exam_quiz"];
$data = process_exam_question($account,$total_exam_quiz,$level);
$rand_quiz = generate_quiz($total_exam_quiz,$data,$account,$level);
$json_exam_id = json_encode($rand_quiz[2]);
$json_correct = json_encode($rand_quiz[1]);
$json_quiz = json_encode($rand_quiz[0]);
$json_data = json_encode($data); 
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<script src="jquery/jquery-1.7.js"></script>
<style>
table,th,td
{
border:1px solid black;
}
</style>
<!--

<link type="text/css" rel="stylesheet" href="css/main.css">
<script type="text/javascript" src="jslib/login_session_chk.js"></script>
-->
<script type="text/javascript">

/* $(window).bind("beforeunload", function() {
  return "Are you sure? 如果尚未提交完成考試等於錯喔";
}); 
 */
$(window).bind("beforeunload", function() {

  $.post("ajax.php",{mode: "user_leave"},
		function(response){
			alert(response);
		}
	);	
	return "Are you sure? 如果尚未提交完成考試等於錯喔";
}); 

/* $(window).bind("beforeunload", function() {
	$.post("ajax.php",{mode: "user_leave"},
		function(response){
			return response;
		}
	);
}); */
$(document).ready(function(){
	var json_data =  <?php echo $json_data?>;
	var json_quiz =  <?php echo $json_quiz?>;
	var json_correct = <?php echo $json_correct?>;
	var json_exam_id =  <?php echo $json_exam_id?>;
	var num_quiz = json_quiz.length;
	var num_question = json_data.length;
	var num_selection = json_data[0].length;
	var question = new Array();
	var selection = new Array();
	var random_num = new Array();
	var a = 0;
	$("#paper").append("<table> </table>");
	for(i=0;i<num_question;i++) 
	{	
		$("#paper table ").append("<tr id='tr"+i+"'>"+i+"</tr><td>"+i+"</td><td id='quiz_td"+i+"'>"+json_quiz[i]+"</td><td id='selection_td"+i+"'></td>");
		//$("#paper").append("<div id='number_div"+i+"' style='border:1px solid #000'>"+i+"<div id='quiz_div+i+' style='border:1px solid #000;display:inline-block;vertical-align:middle;'>"+json_quiz[i]+ "<div id='select_div"+i+"' style='border:1px solid #000;display:inline-block;vertical-align:middle;'></div></div></div>");
		//$("#number_div"+i).append("<div id='quiz_div+i+'>"+json_quiz[i]+"</div>");
		for(j=0;j<num_selection;j++)
		{
			
			selection[i] = json_data[i][j];
			$("#selection_td"+i+"").append("<input type='radio' name='group"+i+"' id='r"+a+"'value='"+selection[i]['explanation']+"'><span>"+selection[i]['explanation']+"<span><br>");
			//$("#select_div"+i+"").append("<input type='radio' name='group"+i+"' value='"+selection[i]['explanation']+"'>"+selection[i]['explanation']+"<br>");
			a++;
		}	
	}
	var student_answer = new Array();
	$("#submit_btn").click(function(){
		for(i=0;i<num_question;i++)
		{	
			student_answer[i] = $("#selection_td"+i+" input:checked").val();
		}
		$.post("ajax.php",{mode: "student_answer",student_answer: student_answer,correct: json_correct,exam_id: json_exam_id},
			function(response){
				if(response == 3)
				{
					alert("尚未填滿!");
				}
				else if(response == 1)
				{
					alert("提交成功!");
					for(i=0;i<num_question;i++)
					{
						for(j=0;j<(num_question*num_selection);j++)
						{
							if(json_correct[i] == $("#r"+j).val())
							{
								$("#r"+j).next("span").css("color","rgb(9, 250, 9)");
								break;
								//$("#r1").next("span").css("color","rgb(9, 250, 9)");
								
							}
						}
					}
					$("#submit_btn input").val("exit");
					$("#submit_btn").click(function(){
						window.location.href ='./main.php'; 
					});
				}
				else if(response ==2)
				{
				
					alert("已經提交過了!");
					
				}
		
			}
		);
	});
});

</script>
</head>
<body>

<div id="quiz">


</div>
<div id="paper">

</div>
<div id="submit_btn">
	<input type="button" value="submit"/> 
</div>
<div id="test_div">
</div>
</body> 
</html> 










