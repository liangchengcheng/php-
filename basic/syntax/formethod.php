<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/12
 * Time: 下午9:21
 */

//for循环
for($i=0;$i<100;$i++){
    echo 'hello'.$i;

    if($i==20){
        //只是跳出当前的循环.
        continue;
    }
}
//while循环
$i=0;
while($i<100){
    echo 'hello while'.$i.'<br>';
    $i++;
}
//do while循环
$j=0;
do{
    echo 'hello do while'.$j;
    $j++;
}while($j<100);