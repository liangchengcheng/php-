<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/15
 * Time: 下午3:55
 */

session_start();

$_SESSION['name']='lcc';

echo session_id();

//摧毁session
session_destroy();

header('Location:getsession.php');