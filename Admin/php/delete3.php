<?php
header("content_type=text/html;charset=utf-8");
$conn=mysql_connect('localhost','root','');
if(!$conn){
    die("连接数据库失败");}
else{
    mysql_select_db("complant",$conn);
    mysql_query("set names 'utf8'");
    $id=$_GET['id'];
    $del="delete from information where id='$id'";
    $set=mysql_query($del);
    if(!empty($_GET['p'])){
        if($set){
            echo"<script>alert('删除成功');location='newcase.php?p=".$_GET['p']."';</script>";
        }
        else {
            echo mysql_error();
            echo "<script>alert('删除失败');location='index.php?p=" . $_GET['p'] . "';</script>";
        }
    }else{
        if ($set) {
            echo "<script>alert('删除成功');location='index.php';</script>";
        } else {
            echo mysql_error();
            echo "<script>alert('删除失败');location='index.php';</script>";
        }
    }
}
?>