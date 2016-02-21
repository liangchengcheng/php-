<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function _before_index(){
        echo "index_before<br>";
    }

    public function index(){
        echo "index<br>";
    }

    public function _after_index(){
        echo "_after_index<br>";
    }
}