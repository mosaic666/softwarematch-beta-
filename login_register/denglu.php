<?php
session_start();
error_reporting(E_ERROR);  
ini_set("display_errors","Off");  
header("content_type:text/html;charset=utf-8");
$con = mysql_connect("localhost","root","");
// if (!$con)
//   {
    
//   }
//   else{
  
//   }
mysql_select_db("complant")or die("数据库选择失败");
$username=$_POST['username'];
$paw=$_POST['password'];
$id=$_POST['ID'];
if(!preg_match("/^1[34578]{1}\d{9}$/",$username)){
    echo "<script>alert('请输入正确的手机号');location='login.html';</script>";
}
if(!$id||!$username||!$paw)
{
	  echo "<script>alert('请选择登录身份或填写账户信息');location='login.html';</script>";
	}
	else{
$result = mysql_query("SELECT paw FROM $id WHERE username='$username'");
$row = mysql_fetch_array($result);
$temp=$row['paw'];
if($temp==$paw)
{
  $_SESSION['username']=$username;
  if($id=='user')
  {
    //isset()检测变量是否设置
    if(isset($_REQUEST['authcode'])){
      session_start();
//strtolower()小写函数
      if(strtolower($_REQUEST['authcode'])== $_SESSION['authcode']){
//跳转页面
        echo "<script language=\"javascript\">";
        echo "document.location=\"../index.php\"";
        echo "</script>";
      }else{
//提示以及跳转页面
        echo "<script language=\"javascript\">";
        echo "alert('验证码输入错误!');";
        echo "document.location=\"./login.html\"";
        echo "</script>";
      }
      exit();
    }
  }
   else if($id=='root')
  {
    if(isset($_REQUEST['authcode'])){
      session_start();
//strtolower()小写函数
      if(strtolower($_REQUEST['authcode'])== $_SESSION['authcode']){
//跳转页面
        echo "<script language=\"javascript\">";
        echo "document.location=\"../Admin/php/index.php\"";
        echo "</script>";
      }else{
//提示以及跳转页面
        echo "<script language=\"javascript\">";
        echo "alert('验证码输入错误!');";
        echo "document.location=\"./login.html\"";
        echo "</script>";
      }
      exit();
    }
  }
}
else{
  echo "<script>alert('登录失败');location='login.html';</script>";
}
mysql_free_result($result);
mysql_close();
	}
header("Content-Type:text/html;charset=utf-8");            //设置头部信息

?>
