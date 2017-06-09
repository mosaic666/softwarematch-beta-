<?php
header("content_type:text/html;charset=utf-8");
$conn= @mysql_connect('localhost','root','');
require_once "email.class.php";
if(!$conn){
	die("连接数据库失败");
}
	else{
		mysql_select_db("complant",$conn);
		mysql_query("set names 'utf8'");
	// $htmlData = '';
	// if (!empty($_POST['hf'])) {
	// 	if (get_magic_quotes_gpc()) {
	// 		$htmlData = stripslashes($_POST['hf']);
	// 	} else {
		$htmlData = $_POST['hf'];
	// 	}
	// }
		$id=$_GET['id'];
		$sql="select * from information WHERE id='$id'";
		$result=mysql_query($sql,$conn);
		$row=mysql_fetch_array($result);
		$mail = $row['email'];
	//******************** 配置信息 ********************************
	$smtpserver = "smtp.163.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "zxtspt12315@163.com";//SMTP服务器的用户邮箱
	$smtpemailto = $mail;//目标邮箱
	$smtpuser = "zxtspt12315@163.com";//SMTP服务器的用户帐号
	$smtppass = "zxtspt12315";//SMTP服务器的用户密码
	$mailtitle = "在线投诉平台【新消息】！";//邮件标题
	$mailcontent = $htmlData;//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
	//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
    	mysql_query("UPDATE information SET state='已完成',hf='$htmlData' WHERE id='$id'");
	if($state==""){
		exit();
		echo"<script>alert('回复失败');location.href='Admin/php/finishedacse.php';</script>";
	}
	else{
		echo"<script>alert('回复成功');location.href='Admin/php/finishedacse.php';</script>";
	}
}
?>