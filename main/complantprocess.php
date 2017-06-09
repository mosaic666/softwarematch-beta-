<?php
session_start();
@$username  = $_SESSION['username'];
$conn = @mysql_connect('localhost', 'root', '');
mysql_select_db('complant', $conn);
mysql_query("set names 'utf8'");
echo mysql_error();
date_default_timezone_set('prc');
if (!$conn) {
    die('数据库连接失败');
}
elseif (empty($username)) {
        echo "<script>alert('请先登录');window.location.href='../login_register/login.html';</script>";
}else{
    @$name1 = $_POST['name1'];
    @$name2 = $_POST['name2'];
    @$email = $_POST['email'];
    @$phone = $_POST['phone'];
    @$category = $_POST['category'];
    @$topic = $_POST['topic'];
    @$content = $_POST['content'];
    @$place = $_POST['place'];
    @$place1 = $_POST['place1'];
    @$company = $_POST['company'];
    @$date = date('y-m-d h:i:s',time());
    @$img = $_POST['field1name'];
//把传递过来的信息入库,在入库之前对所有的信息进行校验。
    if(empty($_POST['name1'])) {
        echo "<script>alert('昵称不能为空');window.location.href='complant.html';</script>";
    }
    if (empty($_POST['name2'])){
        echo "<script>alert('真实姓名不能为空');window.location.href='complant.html';</script>";
    }
    if (empty($_POST['email'])) {
        echo "<script>alert('电子邮箱不能为空');window.location.href='complant.html';</script>";
    }
    if(empty($_POST['phone'])) {
        echo "<script>alert('联系电话不能为空');window.location.href='complant.html';</script>";
    }
    if(empty($_POST['category'])) {
        echo "<script>alert('行业类别不能为空');window.location.href='complant.html';</script>";
    }
    if (empty($_POST['topic'])) {
        echo "<script>alert('投诉主题不能为空');window.location.href='complant.html';</script>";
    }
    if (empty($_POST['content'])){
        echo "<script>alert('投诉内容不能为空');window.location.href='complant.html';</script>";
    }
    if (empty($_POST['place'])) {
        echo "<script>alert('事发地区1不能为空');window.location.href='complant.html';</script>";
    }
    if (empty($_POST['place1'])) {
        echo "<script>alert('事发地区2不能为空');window.location.href='complant.html';</script>";
    }
    if (empty($_POST['company'])) {
        echo "<script>alert('涉及单位不能为空');window.location.href='complant.html';</script>";
    }
}
//$insertsql ="update information SET name1 = '$name1',name2 = '$name2',email = '$email',phone = '$phone',category = '$category',topic = '$topic',content = '$content',place = '$place',place1 = '$place1',company = '$company',state = '待接受',date ='$date',img = '$img'  where username ='$username' ";
echo mysql_error();
$insertsql = "insert into information(name1, name2, email, phone,category, topic,content,place,place1,company,state,img,username,date) values('$name1', '$name2', '$email', '$phone','$category','$topic','$content','$place','$place1','$company','待接受','$img','$username','$date')";
if(mysql_query($insertsql)){
    echo "<script>alert('提交成功');window.location.href='../index.php';</script>";
    echo mysql_error();
    mysql_close();
}else {
    echo "<script>alert('提交失败');window.location.href='complant.php';</script>";
}
?>