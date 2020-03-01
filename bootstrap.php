<?php
include('db.php');
//var_dump($_SESSION);

$sql = "SELECT COUNT(*) as t FROM msg";
$total = $db->read($sql)[0]['t'];

//每页显示
$pageNum = 3;
$pageMax = ceil($total/$pageNum);


//计算当前应显示哪些数据
$page = $_GET['page'] ?? 1;
$offset = ($page-1)*$pageNum;

$sql = "SELECT * FROM `msg` ORDER BY id DESC LIMIT $offset,$pageNum";
$rows = $db->read($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <title>留言板之bootstrap美化版</title>
    <?php include('header.php');?>
</head>

<body>
    <div class='container'>

        <?php include('menu.php');?>

        <div class="jumbotron">
            <h1 class="display-4">我的习作 -- 留言板</h1>
            <p class="lead">根据1024编程实验室做的练习，请多指教。</p>
        </div>

        <form action="save.php" method="POST">
            <div class='row'>
                <div class='col-12'>
                    <div class='form-group'>
                        <textarea name="content" class='form-control' rows="4"></textarea>
                    </div>
                </div>

                <div class='col-3'>
                    <div class='form-group'>
                        <input name='username' class='form-control' type="text" />
                    </div>
                </div>

                <div class='col-9 d-flex'>
                    <div class='form-group ml-auto'>
                        <input class='btn btn-primary' type="submit" value="提交" />
                    </div>
                </div>
            </div>
        </form>

        <div class='row'>
            <?php
                foreach($rows as $key=>$msg){
            ?>
            <div class='col-12'>
                <div class='border rounded p-2 mb-2'>
                    <div class='text-primary'>
                        <p><?php echo ($msg['username']);  ?></p>
                    </div>
                    <div>
                        <p><?php echo ($msg['content']);   ?></p>
                    </div>
                </div>
            </div>
            <?php
                }       
            ?>
        </div>

        <div class='row'>
            <div class='col-12'>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php  for($i=1; $i<=$pageMax; $i++): ?>
                        <li class="page-item">
                            <a class="page-link" href="bootstrap.php?page=<?php echo($i); ?>">
                                <?php echo($i);  ?>
                            </a>
                            <?php endfor;  ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>





    </div>

    </div>

</body>

</html>