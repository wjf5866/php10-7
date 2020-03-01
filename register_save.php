<?php

include('db.php');

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$password1 = trim($_POST['password1'] ?? '');

//var_dump($username,$password,$password1);

if( $username == '' || $password == ''){
    die('用户名或密码为空');
}

if( $password != $password1){
    die('两次密码不相同');
}

$sql = "select count(*) as total from user where username='{$username}'";
$total = $db->read($sql)[0]['total'];

if($total >=1){
    die('用户名已存在');
}

$password = password_hash($password,PASSWORD_DEFAULT);

$sql = "insert into user (username,password) values ('{$username}','{$password}')";

$is = $db->write($sql);

if($is){
    header("refresh:1;url=login.php");
    echo '注册成功，1秒后自动跳转到登录页面';
}else{
    die('写入失败，可能是SQL错误');
}


