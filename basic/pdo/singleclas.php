<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/2/17
 * Time: 下午9:27
 */
class A{
    private static $a=null;

    private function _construct(){

    }

    static function MakeA(){
        if(self::$a==null){
            self::$a=new self();
        }
        return self::$a;
    }
}
print_r(A::makeA());