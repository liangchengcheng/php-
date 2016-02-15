<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript">
        alert(document.cookie);
    </script>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/15
 * Time: 下午3:33
 */

//设置cookie
setcookie('name','梁铖城');

//进行页面跳转
header('Location:get.php');
?>
</body>
</html>