<?php

//连接到数据库
$dsn = 'mysql:dbname=php10-7;host=127.0.0.1';
$pdo = new PDO($dsn, 'root', '123456');

function write($pdo,$sql){
    //将sql送入 prepare方法,准备SQL语句
    $sth = $pdo->prepare($sql);
    //执行SQL
    return $sth->execute();
}

function read($pdo,$sql){
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    return $rows;
}



?>