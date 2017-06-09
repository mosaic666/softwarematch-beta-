<?php
session_start();
$conn = @mysql_connect('localhost', 'root', '');
mysql_select_db('complant', $conn);
mysql_query("set names 'utf8'");
if(!$conn){
    die('数据库连接失败');
}
else{
@$state=$_POST['xuan'];
$id=$_GET['id'];
if(@$_POST['xuan'] == "yes"){
   mysql_query("UPDATE information SET state='已完成' WHERE id='$id'");
   echo"<script>alert('完成投诉');location='finishedacse.php';</script>";
}
else{
	echo"<script>location='daishenli.php';</script>";
	}
}
?>