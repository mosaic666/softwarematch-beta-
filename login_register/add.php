<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/8/19
 * Time: 14:10
 */
session_start();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$username = $_POST['username'];
if(!preg_match("/^1[34578]{1}\d{9}$/",$username)){
    echo "<script>alert('请输入正确的手机号');location='login.html';</script>";
}
else{
$password = $_POST['paw1'];
$passwordsignup_confirm = $_POST['paw2'];
$_SESSION['username'] = $username; //为修改密码提供统一用户名
if ($password != $passwordsignup_confirm){
    echo "<script> alert ('两次密码不一致'); parent.location.href ='register.html';</script>";
}else{
    $conn = @mysql_connect('localhost', 'root', '');
    mysql_select_db('complant', $conn);
    mysql_query("set names 'utf8'");
    echo mysql_error();
    if (!$conn) {
        die('数据库连接失败');
    } else {
        // $res = mysql_query("select content from main WHERE id =1");
        // $arr = mysql_fetch_array($res);
        // $_SESSION['tongzhi'] =$arr['content'];
        // if(stristr($username,'@')){     //邮箱注册
        //     mysql_query("set names 'utf8'");
        //     mysql_select_db('a0820233234', $conn);
        //     $result = @"select email from register WHERE email ='$username'";
        //     $res = mysql_query($result);
        //     $num = @mysql_num_rows($res);
        //     if (@mysql_num_rows($res)) {
        //         echo "<script>alert('此邮箱已被注册');parent.location.href ='http://xiaolinzi.331u.com/ClubHelper/LoginRegister/register.html';</script>";
        //     } else {
        //         $data = "insert into  register (phonenum,email,password) values ('','$username','$password')";
        //         $data2 = "insert into  personinfo (personname,school,emails,phonenums) VALUES ('','','$username','')";
        //         $results = mysql_query($data);
        //         $result2 = mysql_query($data2);
        //         if ($results) {
        //             echo "<script> alert('注册成功');parent.location.href='http://xiaolinzi.331u.com/ClubHelper/personal/Person.php'; </script>";
        //         }
        //         mysql_close($conn);
        //     }

        // }else{                          //手机号注册
            $result = "select  username from user WHERE username ='$username'";
            $res = mysql_query($result);
            $num = mysql_num_rows($res);
            if (mysql_num_rows($res)) {
                echo "<script> alert('用户已经存在');parent.location.href ='register.html';</script>";
            } else {
                $data = "insert into  user (username,paw) values ('$username','$password')";
                $results = mysql_query($data);
                if ($results) {
                    echo "<script> alert('注册成功');parent.location.href='login.html'; </script>";
                    }
                }
            }
        }
    }