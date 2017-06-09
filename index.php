  <?php
  session_start();
  @$username = $_SESSION['username'];
  $conn = @mysql_connect('localhost', 'root', '');
  mysql_select_db('complant', $conn);
  mysql_query("set names 'utf8'");
  echo mysql_error();
  if (!$conn) {
    die('数据库连接失败');
  }
  ?>
  <!doctype html>
  <html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首页</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/index.css" media="only screen and (min-width:610px)">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" media="screen" />
    <link type="text/css" rel="stylesheet" href="css/index_min.css" media="only screen and (max-width:610px)">
  </head>
  <body>
    <!--顶部导航栏-->
    <div class="navbar navbar-default navbar-fixed-top heade" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">网上在线投诉系统</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">首页</a></li>
            <li><a href="main/complant.php">我要投诉</a></li>
            <li><a href="window_of_policy/policy.php">政策之窗</a></li>
            <li><a href="case_show/case.php">案例展示</a></li>
            <li><a href="help/help.php">帮助文档</a></li>
          </ul>
          <?php
          if(empty($_SESSION['username'])){
            echo '<div class="pull-right top_top">';
            echo '<a href="login_register/login.html"><button type="button" class="btn btn-default ">登录</button></a>';
            echo '<a href = "login_register/register.html"><button type="button" class="btn btn-default ">注册</button></a>';
            echo '</div>';
          }
          else{
            echo '<ul class="nav navbar-nav navbar-right">';
            echo '<li class="dropdown">';
            echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><b>$username</b><span class='caret'></span></a>";
            echo '<ul class="dropdown-menu">
            <li><a href="person/person.php"><b>个人中心</b></a></li>
            <li><a href="exit.php"><b>退出</b></a></li>
          </ul>';
          echo '</li>';
          echo '</ul>';
        }
    ?>
      </div>
    </div>
  </div>
  <!-- 图片轮播 -->
  <div class="picture">
   <div id="myCarousel" class="carousel slide">
     <!-- 轮播（Carousel）指标 -->
     <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
      <div class="item active">
       <img src="images/lunbo_one.jpg" class="img-responsive" style=" width:100%;" alt="First slide">
     </div>
     <div class="item">
       <img src="images/lunbo_two.jpg" class="img-responsive" style="width:100%" alt="Second slide">
     </div>
     <div class="item">
       <img src="images/lunbo_three.png" class="img-responsive" style="width:100%" alt="Third slide">
     </div>
   </div>
   <!-- 轮播（Carousel）导航 -->
   <a class="carousel-control left" href="#myCarousel"
   data-slide="prev"><span
   class="glyphicon glyphicon-chevron-left"></span></a>
   <a class="carousel-control right" href="#myCarousel"
   data-slide="next"><span
   class="glyphicon glyphicon-chevron-right"></span></a>
 </div>
</div>

<!--中部内容-->
<div class="all">
	<div class="content">
		<div class="row">
			<div id="left">
				<div id="" style="background:url(images/kuangtu.png); background-size:100% 100%; height:50px">
					<div id="" style="color:#4bb962; font-size:30px; text-align:center;"><b>经典案例展示</b></div>
				</div><br>
				<div id="" style="background:#FFFFFF; width:80%; margin:auto">
					<?php
						$info1 = mysql_query("select * from information  ORDER BY id DESC limit 0,12
						");
						while($info2 = @mysql_fetch_array($info1)){
						echo '<li class="sheng">
						<a href="announcement/announce.php?id='.$info2['id'].'">'.$info2['topic'].'</a>
						</li>';
						echo '<br>';
					}
					?>
				</div>
				<div class="pull-right" style="margin-right:10%">
				  <a style="color:#000000;" href="case_show/case.php">更多>></a><br><br>
				</div>
			</div>
   <div id="right">
    <div id="right_top">
     <div id="" style="background:url(images/kuangtu.png); background-size:100% 100%; height:50px">
      <div id="" style="color:#4bb962; font-size:30px; text-align:center;"><b>公告通知</b></div>
    </div>
    <div id="" style="width:80%; margin:auto">
     <?php
     $res = mysql_query("select * from notice  ORDER BY id DESC limit 0,10");
     while($arr = @mysql_fetch_assoc($res)){
       echo '<li class="sheng"><a href="announcement/noticedetails.php?id='.$arr['id'].'">'.$arr['theme'].'</a></li>';
     }
     ?>
   </div>
   <br>
   <div class="pull-right" style="margin-right:10%">
    <a style="color:#000000;" href="">更多>></a>
  </div>
</div>
<div id="right_bottom">
 <div id="" style="background:url(images/kuangtu.png); background-size:100% 100%; height:50px">
  <div id="" style="color:#4bb962; font-size:30px; text-align:center;"><b>投诉须知</b></div>
</div><br>
<div id="" style="width:80%; margin:auto">
  1.本网站是维权网站，为消费者提供投诉曝光的平台，本网站对投诉信息有处置权。<br>
  2.为了保障您的权益，请您在投诉时填写真实的资料，以便我们和您联系。<br>
  3.如利用本网站投诉攻击其它人或者进行不正当的竞争，将受到法律的制裁。 <br>
  4.本站所有投诉信息均为网友（投诉者）个人意见，并不代表本站观点。<br>
  <br>
</div>
</div>
</div>
</div>
</div>
</div>

<!--底部样式-->
<div class="footer">
	<div id="top"><br>
   <div id="one">
    其他举报方式:
  </div>
  <div id="two">
    <span class="glyphicon glyphicon-phone-alt"></span> &nbsp; 0531-1234567
  </div>
  <div id="three">
    <span class="glyphicon glyphicon-envelope"></span> &nbsp; 123456789@163.com
  </div>
  <div id="four">
    <a style="color:#FFFFFF" href="javascript:void(0)" onMouseOut="hideImg()"  onmouseover="showImg()">
     <span class="glyphicon glyphicon-qrcode"></span> &nbsp; 微信举报</a>
     <div id="wxImg" style="display:none;height:50px;width:50px;back-ground:#f00;position:absolute;">
      <img style="height:120px;width:120px;" src="images/weixin.jpg"/>
    </div>
  </div>
  <div id="five">
   <span class="glyphicon glyphicon-phone"></span> &nbsp; 下载app举报
 </div>
</div>
     <div id="mid">

            <br><br>
            <dl class="guanyu1">
                <dt style="">关于我们</dt>
                <dd>山东建筑大学</dd>
                <dd>煜城工作室</dd>
                <dd>煜城B组</dd>
            </dl>
            <dl class="guanyu2">
                <dt style="">友情链接</dt>
                <dd><a href="http://www.sdjzu.edu.cn/index.php?target=edu">山东建筑大学</a></dd>
                <dd><a href="http://www.315.gov.cn/">315消费者协会</a></dd>
				 <dd><a href="http://218.57.139.17/Default.html">山东消费维权网</a></dd>
                <dd><a href="http://www.apac.org.cn/">中国反钓鱼网站联盟</a></dd>
               
            </dl>
            <dl class="guanyu3">
                <dt>联系我们</dt>
                <dd>邮箱：zxtspt12315@163.com</dd>
                <dd>电话：17865313062</dd>
                <dd>济南市历城区山东建筑大学</dd>
            </dl>
        </div>
<div id="last">
 版权所有 &copy 煜城B组
</div>
</div>
<script type="text/javascript">
  function  showImg(){
    document.getElementById("wxImg").style.display='block';
  }
  function hideImg(){
    document.getElementById("wxImg").style.display='none';
  }
</script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/html5shiv.js"></script>
</body>
</html>
