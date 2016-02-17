<?php

require_once 'functions.php';
if(isset($_GET['id'])&&!empty($_GET['id'])){
    connectDB();
    mysql_selectdb('users');
    $id=intval($_GET['id']);
    $result=mysql_query("delete * from users where id=$id");
    if(mysql_errno()){
        die('can not connect db');
    }
    $arr=mysql_fetch_assoc($result);
}else{
    die('id noe define');
}?>