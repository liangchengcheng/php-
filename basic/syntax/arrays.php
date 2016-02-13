<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/12
 * Time: 下午9:44
 */
$arr=array();

$arr[0]='123';
$arr[1]='222';
$arr[2]='444';
$arr[3]=4;

print_r($arr);

for($i=100;$i++;$i++){
    array_push($arr,'hehe'.$i);
}

//数组的初始化
$a=array('h'=>'hello','w'=>'world');

$a=array(0=>'hello',1=>'world');