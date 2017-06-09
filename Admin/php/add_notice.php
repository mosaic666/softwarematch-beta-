<?php
header("content_type:text/html;charset=utf-8");
$conn= @mysql_connect('localhost','root','');
if(!$conn){
	die("连接数据库失败");}
else{
	mysql_select_db("complant",$conn);
	mysql_query("set names 'utf8'");
	$theme=$_POST['theme'];
	$htmlData = '';
	if (!empty($_POST['content1'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['content1']);
		} else {
			$htmlData = $_POST['content1'];
		}
	}
	$add="insert into `notice` (`theme`,`not_content`) values('$theme','$htmlData')";
	$set=mysql_query($add);
	if($set){
		echo"<script>alert('发布成功');location.href='finish_notice.php';</script>";}
	else{
		echo"<script>alert('发布失败');location='notice.php';</script>";}
	}
?>