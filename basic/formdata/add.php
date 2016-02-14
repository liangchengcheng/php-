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
 * Date: 16/2/14
 * Time: 下午12:31
 */
if($_POST['a']&&$_POST['b']){
    echo $_POST['a']+$_POST['b'];
}else{
    echo '请输入参数';
}?>

</body>
</html>