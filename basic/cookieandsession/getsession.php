<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/15
 * Time: 下午5:58
 */
session_start();
if(isset($_SESSION['name'])){
    echo $_SESSION['name'];
}else{
    echo 'no name found ';
}