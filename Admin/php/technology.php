<?php
session_start();
$conn = @mysql_connect('localhost', 'root', '');
mysql_select_db('complant', $conn);
mysql_query("set names 'utf8'");
if(!$conn){
    die('数据库连接失败');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>投诉平台后台管理系统</title>
	
    <!--Library Styles-->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.css" rel="stylesheet">
    <link href="css/lib/nivo-lightbox.css" rel="stylesheet">
    <link href="css/lib/nivo-themes/default/default.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/fenye.css">
	
    <!--Template Styles-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/scheme/purple.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll">

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
	
    <div id="main-wrapper">
        
        <!-- Site Navigation -->
        <div id="menu">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="images/logo.png" alt="logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a  style="font-size:16px;" href="index.php"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 用户目录</a></li>
                        <li><a  style="font-size:16px;" href="notice.php">  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 发布公告</a></li>
                        <li><a  style="font-size:16px;" href="finish_notice.php"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 历史公告</a></li>
                        <li><a  style="font-size:16px;" href="daishenli.php"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> 处理中案件</a></li>
                        <li><a  style="font-size:16px;" href="finishedacse.php"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> 已完成案件</a></li>
                        <li><a  style="font-size:16px;" href="newcase.php"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> 接受新的案件</a></li>
                        <li  class="active"><a  style="font-size:16px;" href="technology.php"> <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> 技术支持</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
		<div id="container"> 
			<div id="right" style="background:#F7F8F9; min-height:800px;">
				<br><br>
					<h3><b style="margin-left: 10px;">技术支持</b></h3><hr>
		<div class="container" style="margin-left:20%">
			<div class="word" style="font-size: 16px">
			<b>
				<dd>
					煜城B组
				</dd>
				<br>
				<dd>
					负责人：刘宝瑞
				</dd>
				<br>
				<dd>
					电话：17865313062
				</dd>
				<br>
				<dd>
					邮箱：qyliubaorui123@163.com
				</dd>
				<br>
				<dd>
					QQ：1009689798
				</dd>
				<br>
				<dd>
					组队成员
				</dd>
				<br>
				<dd>
                    前台：李磊 阎朝蓬
				</dd>
				<br>
				<dd>
					后台：刘宝瑞 何文祥
				</dd>
				<br>
				<dd>
					美工：宫柯
				</dd>
				</b>
			</div>
			<div class="img-responsive" style="margin-left:20%;margin-top:-15%">
				<img src="images/icono.png" style="width:188px;height:130px;">
			</div>
		</div>
			</div>
		</div>
		
    </div>   
       


    <!-- Library Scripts -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/lib/jquery.preloader.js"></script>
    <script src="js/lib/nivo-lightbox.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/lib/jquery.superslides.min.js"></script>
    <script src="js/lib/smoothscroll.js"></script>
    <script src="js/lib/jquery.bxslider.min.js"></script>
    <script src="js/lib/jquery.mixitup.min.js"></script>
    <script src="js/lib/jquery.backtotop.js"></script>
    <script src="js/lib/jquery.carouFredSel-6.2.1-packed.js"></script>

    <!-- Custom Script -->    
    <script src="js/main.js"></script>
</body>

</html>
