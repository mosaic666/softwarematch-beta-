<?php
session_start();
@$username=$_SESSION['username'];
?>
<!doctype html>
<html lang="zh" class="no-js">
<head>
	<title>帮助文档</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" media="screen" />
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link type="text/css" rel="stylesheet" href="../css/index.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top heade" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">网上在线投诉系统</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../index.php">首页</a></li>
                <li><a href="../main/complant.php">我要投诉</a></li>
                <li><a href="../window_of_policy/policy.php">政策之窗</a></li>
                <li><a href="../case_show/case.php">案例展示</a></li>
                <li class="active"><a href="#">帮助文档</a></li>
            </ul>
           <?php
            if(empty($_SESSION['username'])){
            echo '<div class="pull-right top_top">';
            echo '<a href="../login_register/login.html"><button type="button" class="btn btn-default ">登录</button></a>';
            echo '<a href = "../login_register/register.html"><button type="button" class="btn btn-default ">注册</button></a>';
            echo '</div>';
        }
            else{
                echo '<ul class="nav navbar-nav navbar-right">';
                echo '<li class="dropdown">';
                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><b>$username</b><span class='caret'></span></a>";
                echo '<ul class="dropdown-menu">
                        <li><a href="../person/person.php"><b>个人中心</b></a></li>
                        <li><a href="../exit.php"><b>退出</b></a></li>
                    </ul>';
                echo '</li>';
            echo '</ul>';
            }
            ?>
        </div>
    </div>
</div>
<section class="cd-faq">
	<ul class="cd-faq-categories" style="margin-top:10px;">
		<li><a class="selected" href="#basics" style="text-decoration: none">个人设置</a></li>
		<li><a href="#mobile" style="text-decoration: none">投诉相关</a></li>
		<li><a href="#account" style="text-decoration: none">审核流程</a></li>
		<li><a href="#payments" style="text-decoration: none">管理者职责</a></li>
		<li><a href="#privacy" style="text-decoration: none">最佳体验</a></li>
		<li><a href="#delivery" style="text-decoration: none">其他</a></li>
	</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items" style="margin-top:-70px;">
		<ul id="basics" class="cd-faq-group">
			<li class="cd-faq-title"><h2>个人设置</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">如何查看投诉状态？</a>
				<div class="cd-faq-content">
					<p>点击登录后，点击右上角个人中心然后选择我的投诉进行查看。</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">如何修改密码？</a>
				<div class="cd-faq-content">
					<p>登录后进入个人中心点击左侧导航栏修改密码选项，即可修改密码。</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">如何修改个人信息？</a>
				<div class="cd-faq-content">
					<p>登录后进入个人中心即可进行昵称、邮箱、电话等个人资料的修改。</p>
				</div> <!-- cd-faq-content -->
			</li>

		</ul> <!-- cd-faq-group -->

		<ul id="mobile" class="cd-faq-group">
			<li class="cd-faq-title"><h2>投诉相关</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">投诉须知</a>
				<div class="cd-faq-content">
					<p>1.投诉前请认真阅读首页投诉须知内容</p>
					<p>2.请认真阅读我要投诉界面内容并如实认真填写</p>
					<p>3.您需要对投诉内容的真实性作出保证</p>
					<p>4.请注意投诉证据上传格式。</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">法律法规</a>
				<div class="cd-faq-content">
                    <p>投诉前请认真查看有关法律法规</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="account" class="cd-faq-group">
			<li class="cd-faq-title"><h2>审核流程</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">审核流程</a>
				<div class="cd-faq-content">
                    <p>注册登录——提交投诉信息——管理员审核——投诉时间处理——线下调查——给予反馈</p>
                </div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="payments" class="cd-faq-group">
			<li class="cd-faq-title"><h2>管理员职责</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">管理员职责</a>
				<div class="cd-faq-content">
					<p>1.接收投诉案件</p>
					<p>2.线下调查</p>
					<p>3.获得处理结果并反馈给消费者</p>
				</div> <!-- cd-faq-content -->
			</li>

		</ul> <!-- cd-faq-group -->

		<ul id="privacy" class="cd-faq-group">
			<li class="cd-faq-title"><h2>最佳体验</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">浏览器的选择？</a>
				<div class="cd-faq-content">
                    <p>如果您是Windows XP用户，作为对于微软不再重要的用户群，微软已经放弃以其默认IE8及以下版本浏览器内核为内核的浏览器在您当前操作系统上的内核升级，出于功能支持与安全策略的考虑，请您更新或更换操作系统或通过谷歌浏览器、火狐浏览器使用最新的互联网服务。</p>
                    <p>如果您是Windows 7/8用户，我们推荐您使用最新版本的谷歌浏览器、火狐浏览器，或者您也可以升级到微软提供的最新版本的IE 11浏览器。 </p>
				</div> <!-- cd-faq-content -->
			</li>


			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">移动端访问</a>
				<div class="cd-faq-content">
                    <p>在线投诉平台采用响应式布局，无论您是在手机、平板还是PC 访问,都能获得良好的用户体验。文件预览功能对移动设备专门做了优化，更小的流量更快的速度，2页word保留格式仅仅只有3KB，全球中文支持最好的手机端在线预览技术。可以在手机及平板电脑上浏览所有支持的文档，与PC上的样式一致。</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->

		<ul id="delivery" class="cd-faq-group">
			<li class="cd-faq-title"><h2>其他</h2></li>
			<li>
				<a class="cd-faq-trigger" href="#0" style="color: #a9c056;text-decoration: none;">网上在线投诉平台</a>
				<div class="cd-faq-content">
                    <p>网上在线投诉平台设立目的：投诉平台为帮助消费者维护自己的权益，用户可以通过本平台将自己的
					投诉信息反馈到政府部门，并通过政府部门的处理达到维护自己权益的目的。</p>
					<br>
					<p>平台宗旨：为广大消费者提供的网上维权服务，本着人人都是维权专家，人人都可以
					受理消费者的投诉，维护消费者的合法权益，为改善消费环境做贡献为宗旨</p>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<a id="ibangkf" href="http://www.ibangkf.com">在线客服系统</a>
<script type="text/javascript" src="http://c.ibangkf.com/i/c-zxtspt12315.js"></script>
</body>
</html>