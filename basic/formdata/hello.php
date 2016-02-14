<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php

if(isset($_GET['name'])){
    echo 'hello'.$_GET['name'];
}else{
    echo '请输入名字';
}?>
</body>
</html>