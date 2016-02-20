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
$sql="insert into users(id,name,age) VALUES (?,?,?)";
$stmt=$pdo->prepare($sql);

//     绑定参数
$stmt->bindValue(1,1);
$stmt->bindValue(2,'lcc');
$stmt->bindValue(3,23);

//     你也可以这样绑定
$stmt->bindParam(1,$id);
$stmt->bindParam(2,$name);
$stmt->bindParam(3,$age);
$id=1;
$name='lcc';
$age=122;

//    你还可以这样!
$stmt->execute(array(null,'lcc',34));

//执行
$stmt->execute();
echo $stmt->rowCount();
