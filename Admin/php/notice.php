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
	<link rel="stylesheet" href="../themes/default/default.css" />
<link rel="stylesheet" href="../plugins/code/prettify.css" />
	
    <!--Template Styles-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/scheme/purple.css" rel="stylesheet">
	<script charset="utf-8" src="../kindeditor.js"></script>
	<script charset="utf-8" src="../lang/zh_CN.js"></script>
	<script charset="utf-8" src="../plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : '../plugins/code/prettify.css',
				uploadJson : '../php/upload_json.php',
				fileManagerJson : '../php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
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
                        <li  class="active"><a  style="font-size:16px;" href="notice.php">  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 发布公告</a></li>
                        <li><a  style="font-size:16px;" href="finish_notice.php"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 历史公告</a></li>
                        <li><a  style="font-size:16px;" href="daishenli.php"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> 处理中案件</a></li>
                        <li><a  style="font-size:16px;" href="finishedacse.php"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> 已完成案件</a></li>
                        <li><a  style="font-size:16px;" href="newcase.php"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> 接受新的案件</a></li>
                        <li><a  style="font-size:16px;" href="technology.php"> <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> 技术支持</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
		<div id="container"> 
			<div id="right" style="background:#F7F8F9">
			<br><br>
			 <h3><b style="margin-left: 10px;">发布公告</b></h3><hr>
		<br>
		
		
		<form name="example" method="post" style="width100%; min-height:450px;height:auto;margin-left:15%;" action="add_notice.php">
		
			<div class="form_row" style="font-size: 16px">
				<label>公告标题：</label>
				<input style="width:40%;height:30px;" cols=20 type="text" required class="form_input" name="theme" />
			</div>
			
			<div class="form_row" style="font-size: 16px">
			<br>
				<label>公告内容：</label>
			<br>
			<textarea style="width:80%;min-height:320px" class="form_textarea" required name="content1" >
			</textarea>
			<br><br>
			<input style="margin-left: 28%;width: 25%;height: 50px;font-size: 18px;" class="btn btn-info"  type="submit" value="发布此内容" />
				<br><br><br><br><br><br>
				</div>
		</form>
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
