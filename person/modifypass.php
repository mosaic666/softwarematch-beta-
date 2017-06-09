<?php

session_start();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$username = $_SESSION['username'];
$oldword = $_POST ['oldword'];
$newword = $_POST ['newword'];
$NWD = $_POST['NWD'];
$conn = @mysql_connect('localhost', 'root', '');
mysql_select_db('complant', $conn);
mysql_query("set names 'utf8'");
echo mysql_error();


if (!$conn) {
    die('链接数据库失败');
}else {
    $result1 =@"select  paw from user WHERE username ='{$username}' ";

    $res = mysql_query($result1);
    $result_arr = mysql_fetch_assoc($res);
    $oldword2 = $result_arr['paw'];
    if($oldword==$oldword2){
        if($newword == $NWD){
            $newpass=mysql_query("update user SET paw = '$newword' where username ='$username' ");
            echo "<script> alert ('修改密码成功'); history.go(-1);</script>";
        }else{
            echo "<script> alert ('两次密码不一致');history.go(-1);</script>";
        }
    }else{
        echo "<script> alert ('旧密码错误');history.go(-1); </script>";
    }
}
