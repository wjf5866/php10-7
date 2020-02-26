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
            <textarea ></textarea>
            <input class='username' type="text"/>
            <input class='submit' type="submit" value='提交'/>
            <div style='clear:both'></div>
            <!-- 在最后一个浮动后面清除浮动，否则后面的布局就乱了。
            这种写法就是一个单纯功能性的效果，不会在网页上有任何显示 -->

        </div>
        <div class='list'>
            <div class='msg'>
                <p>用户名</p>
                <p>留言内容</p>
            </div>
            <div class='msg'>
                <p>用户名</p>
                <p>留言内容</p>
            </div>
            <div class='msg'>
                <p>用户名</p>
                <p>留言内容</p>
            </div>
        </div>
       




    </body>

</html>