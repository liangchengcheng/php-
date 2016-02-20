<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/20
 * Time: 下午10:25
 */
try{
    $pdo=new PDO("mysql:host=localhost;dbname=users","root","123");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die("数据库连接失败".$e);
}
//执行数据操作
try{
    //开始事物
    $pdo->beginTransaction();
    $sql="insert into users VALUES (?,?,?)";
    $stmt=$pdo->prepare($sql);
    //传入参数
    $stmt->execute(array(1,"lcc",21));
    $stmt->execute(array(2,"lcc2",22));
    $stmt->execute(array(3,"lc3",23));
    $pdo->commit();
}catch (PDOException $e){
    die("执行失败".$e->getMessage());
    $pdo->roolback();
}