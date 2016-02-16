<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/16
 * Time: 上午11:12
 */
require_once 'functions.php';
if(empty($_GET['id'])){
    die('id is empty');
}
if(empty($_GET['name'])){
    die('name is empty');
}
if(empty($_GET['age'])){
    die('age is empty');
}

$id=intval($_GET['id']);
$name=$_GET['name'];
$age=intval($_GET['age']);

connectDB();
mysql_selectdb('users');
mysql_query("update users set name='$name',age=$age where id=$id");
if(mysql_errno()){
    echo mysql_error();
    die('sql err');
}else{
    header('Location:index.php');
}