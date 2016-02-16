<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/16
 * Time: 上午10:58
 */
require_once 'functions.php';
if(isset($_GET['id'])&&!empty($_GET['id'])){
    connectDB();
    mysql_selectdb('users');
    $id=intval($_GET['id']);
    $result=mysql_query("select * from users");
    if(mysql_errno()){
        die('can not connect db');
    }
    $arr=mysql_fetch_assoc($result);
}else{
    die('id noe define');
}?>
<form action="edit_user_server.php" method="get">
    <div>用户id
    <input type="text" name="id" value="<?php
    $arr['id'];
    ?>"></div>
    <div>用户名字
        <input type="text" name="name" alue="<?php
        $arr['name'];
        ?>"></div>
    <div>用户年纪
        <input type="text" name="age" alue="<?php
        $arr['age'];
        ?>"></div>
    <input type="submit" value="修改">
</form>
</body>
</html>