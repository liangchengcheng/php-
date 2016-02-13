<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/13
 * Time: 下午9:15
 */

$a=array(1,2,3,4);
print_r($a);

//转换成json格式的数据
echo json_encode($a);
$argcs=array('name'=>'lcc','pas'=>'123');