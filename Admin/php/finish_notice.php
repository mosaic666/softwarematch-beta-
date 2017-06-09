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
                        <li  class="active"><a  style="font-size:16px;" href="finish_notice.php"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 历史公告</a></li>
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
			<div id="right" style="background:#F7F8F9;min-height:700px;">
				<br><br>
				<h3><b style="margin-left: 10px;">历史公告</b></h3><hr>
				<table class="table table-hover table-bordered table-responsive"  style="margin:auto;width: 80%;font-size: 14px;color: black">
					<thead>
				<tr>
					<th style="text-align: center;width: 5%;">编号</th>
					<th style="text-align: center;width: 10%;">标题</th>
					<th style="text-align: center;width: 75%;">内容</th>
					<th style="text-align: center;width: 10%;">权限</th>
				</tr>
				</thead>
					<?php
					$host="localhost";
					$user="root";
					$paw="";
					$db="complant";
					$pageSize = 10;
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
					$sql="select * from notice limit $offset,$pageSize";
					$result=mysql_query($sql,$conn);
					$j=0;
					$j=($page-1)*$pageSize+$j;
					while(@$row=mysql_fetch_assoc($result)){
						$j++;
						echo "<tr>";
						echo "<td style='width:5%;text-align: center;'>{$j}</td>";
						echo "<td style='width: 10%;text-align: center;'>{$row['theme']}</td>";
						echo "<td style='width: 75%;'>{$row['not_content']}</td>";
					if(!empty($_GET['p'])) {
						echo "<td style='10%;text-align: center;'><a href='delete.handle1.php?id=" . $row['id'] . "&p=".$_GET['p']."'>删除</a></td>";
					}else{
						echo "<td style='10%;text-align: center;'><a href='delete.handle1.php?id=" . $row['id'] . "'>删除</a></td>";
					}
						echo "</tr>";
					}
					?>
					</table>
					<br>
					<?php
					//<!--		</table>-->
					@mysql_free_result($result);
					$total_sql = "select COUNT(*) from notice";
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
					$page_banner.="<form action='finish_notice.php' method='get'>";
					$page_banner.="到第<input type='text' size='2' name='p'>页";
					$page_banner.="<input type='submit' value='确定'>";
					$page_banner.="</form></div>";
					echo $page_banner;
					?>
					<br>
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
