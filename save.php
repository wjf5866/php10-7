<?php

//var_dump( $_POST);
 //_POST是特定的变量

 $content = $_POST['content'];
 $username = $_POST['username'];
//判断中，因为输入空格不等于''，输入空格不出错
//所以用了一个函数trim过滤掉变量首尾的空格
 if( trim($content) == '' or trim($username) == ''){
    echo '用户名、留言内容不能为空';
    exit;

 }
 if($username == 'admin' || $username == 'root' || $username == '领导人'){
    echo '用户名中不允许出现敏感字';
    exit;

 }

include('db.php');


//编写SQL
$sql = "insert into msg (username,content) values ('{$username}','{$content}')";
//echo $sql;
//测试期间，可以echo($sql)将返回的值拿到navicat中验证一下


$db->write($sql);





//跳转回首页
header('location:bootstrap.php');


?>