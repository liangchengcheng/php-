<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/13
 * Time: 下午9:25
 */

//写出一段数据
//以@符号开头的方法可以忽略警告
$f=fopen('data','w');
if($f){
    fwrite($f,'Hello');
    fclose($f);
}else{
    echo '无权限';
}

echo 'ok';

//读取文件
$fie=@fopen('data','r');
$content=fgets($fie);
echo '内容'.$content;
//一下读完数据
while(!feof($fie)){
    //读取文件
    $content=fgets($fie);
    echo '内容'.$content;
}
//或者下面
echo file_get_contents('data');