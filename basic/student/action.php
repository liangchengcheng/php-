<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/21
 * Time: 下午2:46
 */

//1连接数据库
try{
    //连接数据库
    $pdo=new PDO("mysql:host=localhost;dbname=test","root","");
}catch(PDOException $e){
    die("数据库连接失败".$e->getMessage());
}

//2通过action的值做对应的操作
switch($_GET['action']){

    case "add":
        $id=$_POST['id'];
        $name=$_POST['name'];
        $pwd=$_POST['pwd'];
        $sql="insert into user VALUES ('{$id}','{$name}','{$pwd}')";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('添加成功') ;window.location='index.php'</script>";
        }else{
            echo "<script>alert('添加失败') ;window.history.back()</script>";
        }
        break;

    case "del":
        $id=$_GET['id'];
        $sql="delete from user where id={$id}";
        $no_code=$pdo->exec($sql);
        if($no_code){
            header('Location:index.php');
        }
        break;

    case "edit":
        $id=$_POST['id'];
        $name=$_POST['name'];
        $pwd=$_POST['pwd'];
        //注意整数不加引号
        $sql="update  user  set name='{$name}',pwd='{$pwd}' where id='{$id}' ";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('修改成功') ;window.location='index.php'</script>";
        }else{
            echo "<script>alert('修改失败') ;window.history.back()</script>";
        }
        break;

}