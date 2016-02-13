<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/13
 * Time: 下午9:25
 */

//写出一段数据
$f=fopen('data','w');
if($f){
    fwrite($f,'Hello');
    fclose($f);
}else{
    echo '无权限';
}

echo 'ok';