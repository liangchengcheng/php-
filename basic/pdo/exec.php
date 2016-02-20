<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/20
 * Time: 下午9:27
 */
try{
    $pdo=new PDO("mysql:host=localhost;dbname=user","root","123");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

}catch (PDOException $e){
    die("数据库连接失败".$e->getMessage());
}
$sql="insert into user VALUES ('id','name',12)";
$res=$pdo->exec($sql);

//也可以直接try catch
if($res){
    echo 'ok';
}else{
    echo $pdo->errorCode();
    print_r( $pdo->errorInfo());
}