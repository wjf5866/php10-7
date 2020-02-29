<?php

include('db.php');
$sql = "SELECT * FROM `msg` ORDER BY id DESC";

//$rows = read($pdo,$sql);
$rows = $db->read($pdo, $sql);
?>


<html>
    <head>
        <title>留言板</title>
        <meta charset='utf-8' />
        <style>
        .add, .list{width:800px; margin:0 auto;}
        /* 两个选择器设置相同 */
        textarea{width:100%; height:100px; margin-bottom:10px;}
        /* 通过标签选择器 */
        .username{float:left;}
        .submit{float:right;}
        .msg{border:solid 1px #ccc; margin-top:10px; padding:5px;}
        </style>

    </head>
    <body>
        <div class='add'>
            <form action="save.php" method='POST'>
                <textarea name='content'></textarea>
                <input name='username' class='username' type="text"/>
                <input class='submit' type="submit" value='提交'/>
                <!--为每个表单项设置一个名称，作为唯一的标识，为后续的引用作准备 -->
                <div style='clear:both'></div>
                <!-- 在最后一个浮动后面清除浮动，否则后面的布局就乱了。
                这种写法就是一个单纯功能性的效果，不会在网页上有任何显示 -->
            </form>
        </div>
        <div class='list'>
            <?php
                foreach($rows as $key=>$msg){
            ?>
                    <div class='msg'>
                        <p><?php echo ($msg['username']);  ?></p>
                        <p><?php echo ($msg['content']);   ?></p>
                    </div>
                <?php
                }       
                ?>
            
        </div>
      

    </body>

</html>