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
if($state == "yes"){
   mysql_query("UPDATE information SET state='处理中' WHERE id='$id'");
   echo"<script>alert('已接受');location='daishenli.php';</script>";
}
else{
	echo"<script>location='newcase.php';</script>";
}
}
?>