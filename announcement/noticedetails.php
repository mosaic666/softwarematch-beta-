<?php
session_start();
$username = $_SESSION['username'];
$conn = @mysql_connect('localhost', 'root', '');
mysql_select_db('complant', $conn);
mysql_query("set names 'utf8'");
$id=$_GET['id'];
$sql="select * from notice WHERE id='$id'";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>案例详情查看</title>
    <link rel="stylesheet" type="text/css" href="css/anno.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" media="screen" />
</head>
<body>
<div class="container">
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
                <a class="navbar-brand" href="index.html">网上在线投诉系统</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">首页</a></li>
                    <li><a href="../main/complant.php">我要投诉</a></li>
                    <li><a href="http://www.dqlz.gov.cn/dqlz04/3896.aspx">政策之窗</a></li>
                    <li class="active"><a href="../case_show/case.php">案例展示</a></li>
                    <li><a href="../help/help.php">帮助文档</a></li>
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
    <div class="list" style="border:1px solid #cecece;margin-top: 10%">
        <div class="contentlist">
            <div class="title">
                <?php
                echo "公告主题：";
                echo $row['theme'];
                echo "<br>";
                ?>
            </div>
            <div class="exp"></div>
            <div class="content">
                <?php
                echo "公告内容：<br>";
                echo $row['not_content'];
                echo "<br><br>";
                ?>
            </div>
            <div class="contentbtn"><a href='../index.php'>关闭</a></div>
            <div class="clear"></div>
        </div>
    </div>
</div>

</div>
<!--底部样式-->
<div class="footer" style="margin-top: 45%">
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
            <span class="glyphicon glyphicon-qrcode"></span> &nbsp; 微信举报
        </div>
        <div id="five">
            <span class="glyphicon glyphicon-phone"></span> &nbsp; 下载app举报
        </div>
    </div>
    <div id="mid">
        <br><br>
        <dl class="guanyu" style=" width:30%; margin-left:15%;float:left;">
            <dt style="">关于我们</dt>
            <dd><a href="#">山东建筑大学</a></dd>
            <dd><a href="#">煜城工作室</a></dd>
            <dd><a href="#">煜城B组</a></dd>
        </dl>
        <dl class="guanyu" style=" width:25%;float:left;">
            <dt style="">友情链接</dt>
            <dd><a href="#">山东建筑大学</a></dd>
            <dd><a href="#">315消费者协会</a></dd>
            <dd><a href="#">中国反钓鱼网站联盟</a></dd>
            <dd><a href="#">国家互联网应急中心</a></dd>
        </dl>
        <dl class="guanyu" style=" width:30%;float:left;">
            <dt style="">联系我们</dt>
            <dd><a href="#">邮箱：123456789@163.com</a></dd>
            <dd><a href="#">电话：12345678901</a></dd>
            <dd><a href="#">济南市历城区山东建筑大学</a></dd>
        </dl>

    </div>
    <div id="last">
        版权所有 &copy 煜城B组
    </div>
</div>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        var cla=1;
        $(".c"+cla).addClass('cur');

    })
</script>
    <script src="../js/jquery-1.11.1.min.js"></script>
</body>
</html>