<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/15
 * Time: 下午9:56
 */

//判断数据
if(!isset($_POST['name'])){
    die('user name not define');
}
if(!isset($_POST['age'])){
    die('user age not define');
}

$name=$_POST['name'];

$age=intval($_POST['age']);

if(empty($name)||empty($age)){
    die('user name or age not is empty');
}
require_once 'functions.php';
$conn=connectDB();

if($conn){

    mysql_selectdb('users');
    //插入数据
    mysql_query("insert into users(nage,age)values('$name',$age)");

    if(mysql_errno()){
        echo mysql_errno();
    }

}else{
    die('can not connect db');
}
