<?php
session_start();
$username = @$_SESSION['username'];
$conn = @mysql_connect('localhost', 'root', '');
mysql_select_db('complant', $conn);
mysql_query("set names 'utf8'");
$id=$_GET['id'];
$sql="select * from information WHERE id='$id'";
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
    <link type="text/css" rel="stylesheet" href="../css/index_min.css" media="only screen and (max-width:610px)">
    <link type="text/css" rel="stylesheet" href="../css/index.css" media="only screen and (min-width:610px)">
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
                    <a class="navbar-brand" href="../index.php">网上在线投诉系统</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" style="font-family:宋体">
                        <li><a href="../index.php">首页</a></li>
                        <li><a href="../main/complant.php">我要投诉</a></li>
                        <li><a href="../window_of_policy/policy.php">政策之窗</a></li>
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
                echo "投诉主题：";
                echo $row['topic'];
                echo "<br>";
                echo $row['date'];
                echo "<br>";
                ?>
            </div>
            <div class="exp"></div>
            <div class="content">
                <?php
                echo "投诉类别：";
                echo $row['category'];
                echo "<br>";
                echo "事发地区：";
                echo $row['place'];
                echo $row['place1'];               
                echo "<br>";
                echo "投诉内容：<br>";
                echo $row['content'];
                echo "<br><br>";
                if($row['img']==""){
                    echo "无证据";
                }
                else{
                $array1=explode( ',', $row['img'] ) ;
                // @var_dump($array1);
                $num=count($array1); 
                $i=0;
                $k=1;
                while($num) {
                    echo '<tr>
                    <td> '."证据".$k.'</td>
                    <td>
                        <b><a target="_blank" href="http://obha3pver.bkt.clouddn.com/'.@$array1[$i].'"><button>预览</button></a></b>
                        </td>
                    </tr>';
                    $num--;
                    $i++;
                    $k++;
                }
            }
                ?>
            </div>
            <div class="contentbtn"><?php  echo"<a href='../case_show/case.php?p=".@$_GET['p']."'> 关闭</a>";?></div>
            <div class="clear"></div>
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
            <span class="glyphicon glyphicon-phone-alt"></span> &nbsp; 17865313062
        </div>
        <div id="three">
            <span class="glyphicon glyphicon-envelope"></span> &nbsp; zxtspt12315@163.com
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
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        var cla=1;
        $(".c"+cla).addClass('cur');

    })
</script>
<a id="ibangkf" href="http://www.ibangkf.com">在线客服系统</a>
<script type="text/javascript" src="http://c.ibangkf.com/i/c-zxtspt12315.js"></script>
</body>
</html>