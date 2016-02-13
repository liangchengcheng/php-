<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/13
 * Time: 下午8:11
 */
class Man{

    private $age,$name;

    //下面的这个是构造函数
    public function _construct($age,$name){
        $this->age=$age;
        $this->name=$name;
        echo 'construct a man';
    }

    public function getAge(){
        return $this->age;
    }

    //下面的这个是构造函数
    public static function echoValue(){
        echo 'echoValue a man';
    }

}