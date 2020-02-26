<?php

//var_dump( $_POST);
 //_POST是特定的变量

 $content = $_POST['content'];
 $username = $_POST['username'];

 //var_dump($content, $username);

//连接到数据库
$dsn = 'mysql:dbname=php10-7;host=127.0.0.1';
$pdo = new PDO($dsn, 'root', 'root');

//编写SQL
$sql = "insert into msg (username,content) values ('{$username}','{$content}'";
echo $sql;

//将sql送入 preparev方法
$sth = $pdo->prepare($sql);

//执行SQL
$sth->execcute();

//跳转回首页
header('location:index.index');












?>