<?php
session_start();
$username=@$_SESSION['username'];
$conn = @mysql_connect('localhost', 'root', '');
mysql_select_db('complant', $conn);
mysql_query("set names 'utf8'");
if(!$conn){
    die('数据库连接失败');
}else{
        $sql0="select * from user WHERE username='$username'";
        $result0=mysql_query($sql0,$conn);
        $row0=mysql_fetch_array($result0);
        $name=$row0['name1'];
        $email= $row0['email'];
}
?>

<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>个人中心</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" media="screen" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <link type="text/css" rel="stylesheet" href="css/jquery.Jcrop.min.css">
    <link type="text/css" rel="stylesheet" href="css/personal.css">
    <link type="text/css" rel="stylesheet" href="css/person.css">
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
                <a class="navbar-brand" href="../index.php">网上在线投诉系统</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">首页</a></li>
                    <li><a href="../main/complant.php">我要投诉</a></li>
                    <li><a href="../window_of_policy/policy.php">政策之窗</a></li>
                    <li><a href="../case_show/case.php">案例展示</a></li>
                    <li><a href="../help/help.php">帮助文档</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><?php echo @$_SESSION['username'];?></b><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="person.php"><b>个人中心</b></a></li>
                            <li><a href="../exit.php"><b>退出</b></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <!--中部内容-->
    <div class="content">
      <div class="main-left">
          <div class="main-top">
           <button style="font-size18px;" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="<?php echo @$_SESSION['username']; ?>"><?php echo @$_SESSION['username']; ?></button>
       </div>
       <div class="main-bottom">
           <div class="text">
             <ul>
               <li id="one1" onclick="setTab('one',1,4)" class="hover"><a href="#">个人信息</a></li>
               <hr style="width: 180px">
               <li id="one2" onclick="setTab('one',2,4)" ><a href="#">修改信息</a></li>
               <hr style="width: 180px">
               <li id="one3" onclick="setTab('one',3,4)" ><a href="#">我的投诉</a></li>
               <hr style="width: 180px">
               <li id="one4" onclick="setTab('one',4,4)" ><a href="#">密码修改</a></li>
               <hr style="width: 180px">
               <li><a href="../main/complant.php">我去投诉</a></li>
           </ul>
       </div>
   </div>
</div>

<div id="con_one_1" class="main-right">
 <h3><b style="margin-left: 10px;">个人信息</b></h3><hr><br>
 <p style="margin-left: 40px;"><b>昵称：</b><?php echo $name?><br /></p><br />
 <p style="margin-left: 40px;"><b>电子邮箱：</b><?php echo $email?><br /></p><br />
 <p style="margin-left: 40px;"><b>手机号码：</b><?php  echo $username?><br /></p><br />
</div>
<div id="con_one_2" class="main-right" style="display: none;">
  <h3><b style="margin-left: 10px;">修改信息</b></h3><hr>
  <form method="post" action="Personinfo.php">
   <p style="margin-left: 40px;"><b>昵称</b><input type="text" name="name1" class="input" value="<?php echo $name?>"></p>
   <p style="margin-left: 40px;"><b>邮箱</b><input type="email" name="email" class="input" value="<?php echo $email?>"></p>
   <p class="font"><b>手机号码</b><input disabled type="text" name="phone" class="phone" value="<?php  echo $username?>"><br /><br /></p>
   <button type="submit" class="btn btn-info baocun1"><b>保存</b></button>
</form>
</div>
<div id="con_one_3" class="main-right" style="display: none;">
 <h3><b style="margin-left: 10px;">我的投诉</b></h3><hr>
 <table class="table table-hover table-bordered table-responsive" style="width:90%;margin:auto;font-size:12px;">
    <tr>
        <td>编号</td>
        <td>投诉主题</td> 
        <td>投诉时间</td> 
        <td>当前状态</td>
   </tr>
   <?php
   $i=0;
   $ass =  @mysql_query("select * from information WHERE username ='$username'" );
   while($arr=mysql_fetch_array($ass)){
        $i++;
        echo "<tr>
        <td>".$i."</td>
        <td>".$arr['topic']."</td>
        <td>".$arr['date']."</td>
        <td>".$arr['state']."</td>
        </tr>";
        }
   ?>
</table>
<br> 
</div>
<div id="con_one_4" class="main-right" style="display: none;" >
   <h3><b style="margin-left: 10px;">登录密码</b></h3><hr><br><br>
   <form action="modifypass.php" method="post">
    <p style="margin-left: 45px;"><b>旧密码</b><input type="password" name="oldword" value="" class="input2"></p>
    <p style="margin-left: 45px;"><b>新密码</b><input id="p1" type="password" name="newword" value="" class="input2"></p>
    <p class="font2"><b>确认新密码</b><input id="p2" onblur="return checkPass();" type="password" name="NWD" value="" class="p2"></p><br>
    <span id="errorpwd" style="display:none;color: #FF0000;margin-left: 110px;">两次密码输入不一致！</span>
    <script type="text/javascript">

       function checkPass(){
           var pwd1=document.getElementById("p1").value;
           var pwd2=document.getElementById("p2").value;
           if(pwd1!=pwd2){
               document.getElementById("errorpwd").style.display = "block";
               return false;
           }
       }
   </script>
   <button type="submit" class="btn btn-info baocun2"><b>保存</b></button>
</form>
</div>
</div>



<?php
$imgdir="uploadimg";
if(is_dir($imgdir))
{
    if($handle = opendir($imgdir))
    {
        $i = 0;
        while ( false !== ( $file = readdir( $handle ) ) )
        {
            if (!is_dir($imgdir.'/'.$file))  //!( $file != "." ) && !( $file != ".." )
            {
                $FCTime = date('Y-m-d H:i:s', filectime($imgdir.'/'.$file));

                if(DateDiff ('s', date('Y-m-d H:i:s'),$FCTime)>60)
                {
                    unlink($imgdir.'/'.$file);
                }
                else
                {
                    $i += 1;
                    echo '<tr bgcolor="#99CC99">';
                    echo '<td><img src="'.$imgdir.'/'.$file.'" /></td><td>'.$FCTime.'</td>';
                    echo "</tr>";
                }
            }
        }
        closedir( $handle );
    }
}



/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * 函数名称：DateDiff(interval,date1,date2)
 * 函数作用: 返回两个日期之间的时间间隔
 * 参    数：$intervals 时间间隔字符串表达式
 *           $date1 时间表达式
 *           $date2 时间表达式
 *
 * intervals(时间间隔字符串表达式)可以是以下任意值:
 * w  周
 * d  天
 * h  小时
 * n  分钟
 * s  秒
 */
function DateDiff ($interval, $date1,$date2)
{
    $thistime=strtotime($date1);
    $date1=mktime(intval(date("G",$thistime)),intval(date("i",$thistime)),intval(date("s",$thistime)),intval(date("m",$thistime)),intval(date("j",$thistime)),intval(date("Y",$thistime)));
    $thistime=strtotime($date2);
    $date2=mktime(intval(date("G",$thistime)),intval(date("i",$thistime)),intval(date("s",$thistime)),intval(date("m",$thistime)),intval(date("j",$thistime)),intval(date("Y",$thistime)));
    $timedifference=($date1-$date2);
    switch ($interval) {
        case "w": $retval = bcdiv($timedifference ,604800); break;
        case "d": $retval = bcdiv( $timedifference,86400); break;
        case "h": $retval = bcdiv ($timedifference,3600); break;
        case "n": $retval = bcdiv( $timedifference,60); break;
        case "s": $retval = $timedifference; break;
    }
    return $retval;
}

?>
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
    <dl class="guanyu" style=" width:30%; margin-left:8%;float:left;">
       <dt style="">关于我们</dt>
       <dd><a href="#">山东建筑大学</a></dd>
       <dd><a href="#">煜城工作室</a></dd>
       <dd><a href="#">煜城B组</a></dd>
   </dl>
   <dl class="guanyu" style=" width:30%;float:left;">
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
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/personal.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>