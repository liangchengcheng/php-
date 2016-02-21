<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/21
 * Time: 下午5:28
 */

function getTestData(){
    $data=array();
    for($i=0;$i<10;$i++){
        $data[$i]['name']='user'.$i;
        $data[$i]['age']=rand(18,90);
    }
    return $data;
}