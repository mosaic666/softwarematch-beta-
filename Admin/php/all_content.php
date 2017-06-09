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
                     <li class="active"><a  style="font-size:16px;" href="newcase.php"> <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> 接受新的案件</a></li>
                     <li><a  style="font-size:16px;" href="technology.php"> <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> 技术支持</a></li>
                 </ul>
             </div>
             <!-- /.navbar-collapse -->
         </nav>
     </div>
     <div id="container"> 
         <div id="right" style="background:#F7F8F9">
           <br><br>
           <h3><b style="margin-left: 10px;">案例详情</b></h3>
           <hr>
           <div id="" style="margin:auto;font-size:18px;">
              <table class="table table-hover table-bordered table-responsive"  style="margin:auto;width: 80%;font-size: 14px;color: black">
                <?php
                $conn = @mysql_connect('localhost', 'root', '');
                mysql_select_db('complant',$conn);
                mysql_query("set names 'utf8'");
                @$id=$_GET['id'];
                $sql="select * from information WHERE id='$id'";
                $result=mysql_query($sql,$conn);
                $row=mysql_fetch_array($result);
                ?>
                <tr>
                    <td rowspan="2" style="width:50%;">昵称：<?php echo $row['name1']?></td>
                    <td style="width:50%;">手机号码：<?php echo $row['phone']?></td>
                </tr>
                <tr><td style="width:50%;">电子邮箱：<?php echo $row['email']?></td></tr>
                <tr>
                    <td rowspan="2">真实姓名：<?php echo $row['name2']?></td>
                    <td style="width:50%;">投诉时间：<?php echo $row['date']?></td>
                </tr>
                <tr><td style="width:50%;">投诉类别：<?php echo $row['category']?></td></tr>
                <tr>
                    <td style="width:50%;">事发地区：<?php echo $row['place']?></td>
                    <td style="width:50%;">涉及单位：<?php echo $row['company']?></td>
                </tr>
                <tr><td colspan="2" style="width:100%;">投诉主题：<?php echo $row['topic']?></td></tr>
                <tr><td colspan="2" style="height:200px;width:100%;">投诉内容：<?php echo $row['content']?></td></tr>
                <tr><td colspan="2" style="width:100%;">投诉证据：
                    <?php
                    if ($row['img']=="") {
                     echo "无证据";
                    }
                    else{
                    $array1=explode( ',', $row['img'] ) ;
                // @var_dump($array1);
                    $num=count($array1); 
                    $i=0;
                    $k=1;
                    while($num) {
                        $path="http://obha3pver.bkt.clouddn.com/$array1[$i]";
                        echo "证据".$k;
                        echo  "<a target='_blank' href='$path'><button>预览</button></a>";
                    $num--;
                    $i++;
                    $k++;
                }
              }
            ?>
            </td></tr>
            <tr><td colspan="2" style="width:100%;">  <br>
                <form style="font-size:20px;"  method="post" action="update1.php?id=<?php echo $id; ?>">
                    <font style="margin-left:8%">是否接收此案件？</font>
                    <input type="radio" style="margin-left:40%" checked="checked" name="xuan" value="yes" />是
                    <input type="radio" name="xuan" value="no" />否

                    <input class="btn btn-info" style="margin-left:0;min-width:12%;" type="submit" name="" value="提交">
                </form>
                <br></td>
            </tr>
        </table>    
        <br><br><br><br><br>
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
<script src="js/lib/jquery.sudoslider.min.js"></script>
<script src="js/lib/jquery.bxslider.min.js"></script>
<script src="js/lib/jquery.mixitup.min.js"></script>
<script src="js/lib/jquery.backtotop.js"></script>
<script src="js/lib/jquery.carouFredSel-6.2.1-packed.js"></script>
<script src="js/lib/retina.min.js"></script>

<!-- Custom Script -->    
<script src="js/main.js"></script>
</body>

</html>
