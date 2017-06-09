<?php
session_start();
// $category = $_SESSION['category'];
@$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>案例展示</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/pagination.css" />
    <link rel="stylesheet" type="text/css" href="css/case.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../css/index.css" media="only screen and (min-width:610px)">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" media="screen" />
	<link type="text/css" rel="stylesheet" href="../css/index_min.css" media="only screen and (max-width:610px)">
    <link type="text/css" rel="stylesheet" href="../css/index.css" media="only screen and (min-width:610px)">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.pagination.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#Pagination").pagination("15");
        });
    </script>
    <style>
        body{
            font-size: 12px;
            FONT-FAMILY: 'Microsoft Yahei', verdana;width: 100%;
        }
        div.page{
            text-align: center;
        }
        div.content{
            height: 300px;
            text-align: center;
        }
        div.page a{
            border: #aaaadd 1px solid;text-decoration: none; padding: 2px 5px 2px 5px;margin: 2px; border-color: #0d87cc;
        }
        div.page span.current{
            border: #000099 1px solid;background-color: #000099;padding: 4px 6px 4px  6px;margin: 2px;color: #fff;font-weight: bold;
        }
        div.page span.disabled{
            border: #eee 1px solid;padding: 2px 5px 2px 5px;margin: 2px; color: #ddd;
        }
        div.page form{
            display: inline;
        }
    </style>
</head>
<body>
<div class="container" style="height: auto; min-height: 900px;">
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
                <a class="navbar-brand" href="../index.php" style="font-family:宋体">网上在线投诉系统</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav" style="font-family:宋体">
                    <li><a href="../index.php">首页</a></li>
                    <li><a href="../main/complant.php ">我要投诉</a></li>
                    <li><a href="../window_of_policy/policy.php">政策之窗</a></li>
                    <li class="active"><a href="../case_show/case.php ">案例展示</a></li>
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
    <div class="row">
<img class="img-responsive" style="margin: auto;margin-top:1%" src="images/xx3.png">
        </div>
<div class="blank20"></div>

<div class="container" style="margin-left:-1.4%">
    <div class="row">
        <table class="table table-bordered" style="text-align:center;">
            <thead>
            <tr>
                <th ><p>投诉主题</p></th>
                <th><p>投诉时间</p></th>
                    <th><p>投诉类型</p></th>
                <th><p>投诉人</p></th>
				<th><p>查看详情</p></th>
                <th><p>处理结果</p></th>
            </tr>
            </thead>
            <?php
            $host="localhost";
            $user="root";
            $paw="";
            $db="complant";
            $pageSize = 15;
            $showPage = 5;
            $conn = mysql_connect($host,$user,$paw);
            if (!$conn) {
                echo "数据库连接失败";
                exit;
            }
            mysql_select_db($db);
            mysql_query("set names 'utf8'");
            if(empty($_GET['p'])||$_GET['p']<0){
                $page=1;
            }else {
                $page=$_GET['p'];
            }
            @$offset=$pageSize*($page-1);
            $sql="select * from information ORDER BY id DESC limit $offset,$pageSize ";
            $result=mysql_query($sql,$conn);
            echo"<tbody>";
            while(@$row=mysql_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>{$row['topic']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td>{$row['category']}</td>";
                echo "<td>{$row['name1']}</td>";
				echo "<td><a  href='../announcement/announce.php?id=".$row['id']."&p=".$page."'>查看详情</a> </td>";
                echo "<td>{$row['state']}</td>";
                echo "</tr>";
            }
            echo"</tbody>";
            ?>
        </table>
        <?php
        @mysql_free_result($result);
        $total_sql = "select COUNT(*) from information";
        @$toal_result = mysql_fetch_array(mysql_query($total_sql));
        $total=$toal_result[0];
        $total_pages = ceil($total/$pageSize);
        mysql_close($conn);
        $page_banner="<div class='page'>";
        $pageoffset = ($showPage-1)/2;
        if($page>1){
            $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
            $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a>";
        }else{
            $page_banner.="<span class='disabled'>首页</a></span>";
            $page_banner.="<span class='disabled'><上一页</a></span>";
        }
        $start = 1;
        $end = $total_pages;
        if($total_pages>$showPage){
            if($page>$pageoffset+1){
                $page_banner.="...";
            }
            if($page>$pageoffset){
                $start=$page-$pageoffset;
                $end=$total_pages>$page+$pageoffset?$page+$pageoffset:$total_pages;
            }
            else{
                $start=1;
                $end=$total_pages>$showPage?$showPage:$total_pages;
            }
            if($page+$pageoffset>$total_pages){
                $start=$start-($page+$pageoffset-$end);
            }
        }
        for($i=$start;$i<=$end;$i++){
            if($page==$i){
                $page_banner.="<span class='current'>{$i}</span>";
            }else{
                $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
            }
        }
        if($total_pages>$showPage && $total_pages>$page+$pageoffset){
            $page_banner.="...";
        }
        if($page<$total_pages){
            $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页></a>";
            $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($total_pages)."'>尾页</a>";
        }else{
            $page_banner.="<span class='disabled'>下一页></a></span>";
            $page_banner.="<span class='disabled'>尾页</a></span>";
        }
        $page_banner.="共{$total_pages}页,";
        $page_banner.="<form action='case.php' method='get'>";
        $page_banner.="到第<input type='text' size='2' name='p'>页";
        $page_banner.="<input type='submit' value='确定'>";
        $page_banner.="</form></div>";
        echo $page_banner;
        ?>
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
    
    <a id="ibangkf" href="http://www.ibangkf.com">在线客服系统</a>
<script type="text/javascript" src="http://c.ibangkf.com/i/c-zxtspt12315.js"></script>
</body>
</html>