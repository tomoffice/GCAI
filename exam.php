<?php
session_start();
require("phplib/tool.lib.php"); //login_chk() chk_login_state()
require("phplib/mysql_select.lib.php");//chk_member_account() get_member_password()
require("phplib/quiz.lib.php");//process_exam_question()
require("phplib/mysql_insert.lib.php");//generate_quiz()
									//SESSION
//////////////////////////////////////////////////////////////////////////////////////
$session_member_id = $_SESSION['member_id'];
$account = $_SESSION["account"];
//////////////////////////////////////////////////////////////////////////////////////
if(empty($_POST["level"]) == true)
{
    header('Location: http://127.0.0.1/GCAI');
    exit;
}
else
{
	$level = $_POST["level"];
	$level_node = $_POST["level_node"];
	$tmp = query_exam_id($session_member_id);/////
	if($tmp == false)
	{	
		$exam_id = 1;
		//insert_exam_log($member_id['id'],$level,$exam_id);
	}
	else
	{		
		$exam_id = $tmp+1;	
	}  
	$json_level = json_encode($level);
	$json_exam_id = json_encode($exam_id);
	$json_member_id = json_encode($session_member_id);
	$json_level_node = json_encode($level_node);
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<link href="/GCAI/bootstrap-3.2.0-dist/css/bootstrap.css" rel="stylesheet">
<link href="/GCAI/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">
<script src="jquery/jquery-1.7.js"></script>
<style>
table,th,td
{
	border:1px solid black;
}
#paper
{
	display:inline-block;
}
</style>
<!--

<link type="text/css" rel="stylesheet" href="css/main.css">
<script type="text/javascript" src="jslib/login_session_chk.js"></script>
-->
<script type="text/javascript">
/* $(window).bind("beforeunload", function() {
	return "測驗取消";
});  */

$(document).ready(function(){

	var json_member_id = <?php echo $json_member_id?>;
	var json_exam_id =  <?php echo $json_exam_id?>;
	var json_level =  <?php echo $json_level?>;
	var json_level_node =  <?php echo $json_level_node?>;
	var student_answer = new Array();
	var selection = new Array();

	var a = 0;
	var num_question = 0;
	var json_correct = 0;
	var num_selection = 0;
	var num_quiz = 10;
	var defaulthearts = 5;
	var hearts = 5;
	progress = 100/num_quiz;
	var x = 0;
	progress_tmp = 0;
	exam_chk = 0;
	num_correct = 0;
	$("#submit_btn input").attr('chk','0');
	
	
	
	function generate_quiz()
	{	
		$.post("ajax.php",{mode: "generate_quiz",level: json_level,exam_id: json_exam_id,level_node: json_level_node},
			function(response){
				var json = $.parseJSON(response);
				var json_data = json[0];
				var json_quiz = json[1][0];
				json_correct = json[1][1];//變成全域變數
				num_question = json_data.length;//變成全域變數
				num_selection = json_data[0].length;//變成全域變數
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
			}
		);
	}
	function mark_quiz()
	{	
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
				else if(typeof(response) == 'string')
				{
					var json = $.parseJSON(response);
					if(json == 'wrong')
					{
						$("#message").append("<div id='chk_message'>答案錯誤</div>").css("color","rgb(255, 0, 0)");
						$("#chk_message").css("color","rgb(255, 0, 0)")
						hearts--;
						//alert(hearts);
						$("#chk_message").append("<div id='correct_message'>正確答案:"+json_correct[0]+"</div>");
						$("#correct_message").css("color","rgb(0, 0, 0)")
						$("#hearts span").text(hearts+"/"+defaulthearts);
					}
					else
					{
						$("#message").append("<div id='chk_message'>答案正確</div>").css("color","rgb(0, 255, 0)");
						$("#chk_message").css("color","rgb(0, 255, 0)")
						num_correct++;
					}
					
					
					/* 
					var tmp = 0;
					var j = 0;
					alert("提交成功!");
					for(i=0;i<num_question;i++)
					{
						for(j=0;j<(num_question*num_selection);j++)
						{
							if(json_correct[i] == $("#r"+tmp).val())
							{
								$("#r"+tmp).next("span").css("color","rgb(9, 250, 9)");
								//$("#r1").next("span").css("color","rgb(9, 250, 9)");
							}
							tmp++;
						}
					}	 
					*/
				}
				else if(response == 2)
				{	
					alert("已經提交過了!");		
				}
			}
		);
	}
	$("input[type=radio]").live( "click", function() {
		$("input[type=button]").show();//假如radio有被點就顯示按鈕(避免沒有填滿)
	});
	$(".progress").html("<div class='progress-bar' style='width: "+progress+"%;'>"+progress+"%</div>");//進度條
	$("#hearts").append("<span class='glyphicon glyphicon-heart' style='color: rgb(255, 20, 23); font-size: 30px;'>"+hearts+"/"+defaulthearts+"</span>");
	//$("#paper").before("<div id='hearts'>hearts : "+hearts+"</div>");
	generate_quiz();
	$("#submit_btn input").hide();
	$("#submit_btn input").click(function()
	{	
		
		if(hearts >= 1)
		{
			if(x < num_quiz)
			{	
				$("#message").empty();
				var chk = $(this).attr('chk');
				if (chk == '0')
				{
					mark_quiz();
					$(this).attr('chk','1').attr('value','繼續');
					x++;
				}
				else
				{	
					$("#submit_btn input").hide();
					$("#paper").empty();
		
					generate_quiz();
					$(this).attr('chk','0').attr('value','檢查');
				}
				progress_tmp = progress*x;
				$(".progress").html("<div class='progress-bar' style='width: "+progress_tmp+"%;'></div>");
			}
			else
			{
				exam_chk = 1;
				mark_quiz();
				$("#submit_btn input").val("exit");
				$.post("ajax.php",{mode: "insert_exam_record",member_id: json_member_id,level: json_level,correct: num_correct,exam_id: json_exam_id,level_node: json_level_node}, 
					function(response){
					alert(response)
					}
				);
				if($(this).val()== "exit")
				{
					$("#submit_btn").click(function(){
						window.location.href ='./main.php';
						}
					);
				}	
			}
		}
		else
		{
			alert("錯誤機會用完了");

/* 			$.post("ajax.php",{mode: "delete_exam_all",member_id: json_member_id,level: json_level,exam_id: json_exam_id}, 
				function(response){
				}
			); */
			$("#submit_btn input").val("exit");
				if($(this).val()== "exit")
				{
					$("#submit_btn").click(function(){
						window.location.href ='./main.php';
						}
					);
				}
		
		
		}
	});
});

</script>
<?php
}
?>
</head>
<body>

<div id='quiz'>
</div>

<div class="progress">
  <!--<div class="progress-bar" style="width: 60%;"></div>-->
  <div class='progress-bar' style='width: 0%;'></div>
</div>
<div id='hearts'></div>
<div id='paper'>

</div>
<div id='submit_btn'>
	<input type='button' value="檢查"/> 
</div>
<div id='message'>

</div>

</body> 
</html> 