<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/17
 * Time: 下午9:40
 */

try{
    $pdo=new PDO("mysql:host=localhost;dbname=users","root","123");

}catch (PDOException $e){
    die("数据库连接失败".$e);
}
print_r($pdo);

//执行查询的操作

$sql="select * from users";
$stmt=$pdo->query($sql);
$list=$stmt->fetchAll(PDO::FETCH_ASSOC);

//解析数据
foreach($list as $val){
    echo $val['name'].$val['age'];
}

//释放资源
$stmt=null;
$pdo=null;



