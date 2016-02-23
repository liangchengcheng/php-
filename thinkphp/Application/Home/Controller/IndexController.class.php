<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    
    public function index() {
        
        //读取全部配置项
        // $config=C('');
        // dump($config);
        
        $this->listActionsUrl();
    }
    
    /**
     * 列出User控制器操作方法的URL
     */
    private function listActionsUrl()
    {
        echo "当前URL模式为：".C('URL_MODEL');
        echo "<hr>";

        echo "User控制器index操作方法的URL为：<a href=\"".U('Home/User/index')."\">".U('Home/User/index')."</a>";
        echo "<hr>";

        echo "User控制器edit操作方法的URL为：<a href=\"".U('Home/User/edit')."\">".U('Home/User/edit')."</a>";
        echo "<hr>";

        echo "User控制器login操作方法的URL为：<a href=\"".U('Home/User/login')."\">".U('Home/User/login')."</a>";
        echo "<hr>";
    }



    /**
     * index前置操作
     */
    // public function _before_index() {
    //     echo "index.before</br>";
    // }

    /**
     * index后置操作
     */
    // public function _after_index() {
    //     echo "index.after</br>";
    // }

    /**
     * 操作方法后缀
     */
    // public function listAction()
    // {
    //  echo "list";
    // }


}
