<?php
include('db.php');
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

//var_dump($username,$password);

if( $username == '' || $password == ''){
    die('用户名或密码为空');
}

$sql = "select * from user where username='{$username}'";
$user = $db->read($sql)[0];
if($user== false){
    die('用户名不存在');
}

if(!password_verify($password,$user['password'])){
    die('密码错误');
}

//session_start();
$_SESSION['id'] = $user['id'];
//var_dump($_SESSION['id']);
header("refresh:1,url=bootstrap.php");
echo('登录成功，1秒后跳转到首页');