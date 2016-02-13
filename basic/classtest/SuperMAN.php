<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/13
 * Time: 下午8:50
 */
require_once 'MAN.php';
class SuperMAN extends Man{
    public function _construct($age){

        parent::_construct($age, '名字是梁铖城');
    }

}