<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php

//$con=mysql_connect('localhost:3306','root','123');
//mysql_select_db('user',$con);
//$result=mysql_query('SELECT * FROM users');
//$arr=mysql_fetch_array($result);
//$arr=mysql_fetch_assoc($result);
//数据条数
//$a=mysql_num_rows($result);
//for循环输出assoc

$link = mysqli_connect('localhost', 'root', '111', 'user');
if($link){
    echo '链接成功';
}else{
    echo '链接失败';
}?>

</body>
</html>