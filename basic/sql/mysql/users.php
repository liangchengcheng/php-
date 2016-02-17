<?php
require_once 'functions.php'
?>

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
 * Date: 16/2/15
 * Time: 下午9:27
 */

$conn=connectDB();
mysql_select_db('users');
$result=mysql_query('select * from users ORDER BY id',$conn);
$dataCount=mysql_num_rows($result);

echo "<table style='text-align: center;border: solid;'>";
echo "<tr><th>id</th><th>name</th><th>age</th></tr>";
for($i=0;$i<$dataCount;$i++){

    $result_arr=mysql_fetch_assoc($result);

    $id=$result_arr['id'];
    $name=$result_arr['name'];
    $age=$result_arr['age'];

    echo "<tr>
    <td>$id</td>
    <td>$name</td>
    <td>$age</td>
    <td><a href='edituser.php?id=$id'修改</a></td>
    <td><a href='delete.php.php?id=$id'删除</a></td>
    </tr>";

}
echo "</table>";

?>
</body>
</html>