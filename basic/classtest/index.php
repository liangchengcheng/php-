<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/13
 * Time: 下午8:01
 */
require_once 'hello.php';
require_once 'jkxy/JX.php';
require_once 'MAN.php';
$h=new Hello();
$h->sayHello();

$f=new \jkxy\JXName();


//类方法
MAN::echoValue();