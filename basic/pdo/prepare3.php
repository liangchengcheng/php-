<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/20
 * Time: 下午9:40
 */

//用于查询执行sql语句 prepare()

//将值绑定在对应的一个参数 返回布尔值 bindValue()

//将参数绑定到对应的查询占位符 返回布尔值 bindParam()

//用于匹配列名和指定的变量名字 bindColumn();

//执行一个准备好的预处理语句 返回布尔 execute();

//返回使用增删改查 影响的行数 rowCount();

try{
    $pdo=new PDO("mysql:host=localhost;dbname=jikexueyuan","root","123");
}catch (PDOException $e){
    die("数据库连接失败".$e->getMessage());
}
//预处理的sql语句
$sql="select id name age from users";
$stmt=$pdo->prepare($sql);
$stmt->execute();

//foreach($stmt as $row){
//    echo $row['id'].".......".$row['name']."====".$row['age'];
//}

$stmt->bindColumn(1,$id);
$stmt->bindColumn(2,$name);
$stmt->bindColumn("age",$age);
while($row=$stmt->fetch(PDO::FETCH_COLUMN)){
    echo "{$id}:{$name}:{$age}";
}


