<html>
<head>
<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script src="jquery/jquery-1.7.js"></script>
	
	<script type="text/javascript" src="jslib/login_session_chk.js"></script>
	<script type="text/javascript" src="jslib/lesson.js"></script>
	<!--<script type="text/javascript" src="jslib/leaderboard.js"></script> -->
	<script type="text/javascript" src="jslib/query_level.js"></script>
	<script type="text/javascript" src="jslib/progress.js"></script>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////畫圖lib-->
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////bootstrap-->
	<link href="/GCAI/bootstrap-3.2.0-dist/css/bootstrap.css" rel="stylesheet">
<!--<link href="/GCAI/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<style>
	#mychart 
	{
		width: 400px;
		height: 200px;
	}
	</style>

</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" id="head">head</div>
<div id="main">main
	<div class="content">
		<div class="left">技能樹
		<div class="skill">

		</div>
		</div>
		<div class="right">right
			<div id="right_top">排行榜</div>
			<div id="right_medium">學習進度
				<div id="state" style="margin: 5px auto">
					<span class="glyphicon glyphicon-chevron-up" style="color: rgb(63, 176, 237); font-size: 28px;"></span>
					<!--<span class="glyphicon glyphicon-chevron-up" style="color: rgb(63, 176, 237); font-size: 28px;"></span>-->
					<span class="glyphicon glyphicon-star" style="color: rgb(249, 231, 0); font-size: 28px;"></span>
					<!--<span class="glyphicon glyphicon-star" style="color: rgb(254, 216, 0); font-size: 28px;"></span>-->
					
				</div>
				<div id="p_level_progress" style="width: 200px; high:300 px; margin: 0 auto">
					<div class="progress">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
						0%
						</div>
					</div>
				</div>
				<div id="container" style="min-width: 310px; height: 250px; margin: 0 auto"></div>
			</div>
			<div id="right_bottom">分享</div>
		</div>
	</div>
</div>
</body> 
</html> 