<?php
session_start();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$username  = $_SESSION['username'];
$name1 = $_POST['name1'];
$mail = $_POST['email'];
//$newphone = $username;
$conn = @mysql_connect('localhost', 'root', '');
mysql_select_db('complant', $conn);
mysql_query("set names 'utf8'");
echo mysql_error();
if (!$conn) {
    die('数据库连接失败');
}else {
    mysql_query("set names 'utf8'");
    $result = @"select  * from user WHERE username = '$username'";
    $res = mysql_query($result);
    $num = @mysql_num_rows($res);
    if ($num) {
        $info =mysql_query("update user SET name1 = '$name1',email = '$mail' where username = '$username'");

        // if(mysql_num_rows(mysql_query("select  username  from user WHERE username ='$username'"))){
        //     $info2 =mysql_query("update user SET username = '$newphone' where username = '$username'");
        //     $_SESSION['username'] = $newphone;
            echo "<script> alert ('保存成功');history.go(-1);</script>";
        // }
    }else{
        echo "<script> alert('保存失败');history.go(-1);</script>";
    }
}