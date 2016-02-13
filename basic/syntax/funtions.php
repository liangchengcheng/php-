<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/12
 * Time: 下午4:21
 */
function trans_HelloPHP(){
    echo 'Hello PHP';
}

trans_HelloPHP();
//下面我们将一个方法变成一个变量
$fun='trans_HelloPHP';
$fun();

function sayHelloTo($name){
    echo 'Hello'.$name.'<br>';
}
sayHelloTo('张三');
sayHelloTo('张三1');

function transNum($a,$b){
    echo 'a='.$a.'b='.$b.'<br/>';
}
transNum(1,2);

function add($a,$b){
    return $a+$b;
}