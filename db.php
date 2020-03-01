<?php
session_start();
//获取当前登录用户的ID
$user_id = $_SESSION['id'] ?? 0;

class DB{ 

    public $pdo=null;
    function __construct(){
        //连接到数据库
        $dsn = 'mysql:dbname=php10-7;host=127.0.0.1';
        $this->pdo = new PDO($dsn, 'root', '123456');
        
    }

    function write($sql){
        //将sql送入 prepare方法,准备SQL语句
        $sth = $this->pdo->prepare($sql);
        //执行SQL
        return $sth->execute();
    }
    
    function read($sql){
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $rows = $sth->fetchAll();
        return $rows;
    }

}


$db = new DB();


?>