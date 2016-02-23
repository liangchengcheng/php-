<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller
{
    
    /**
     * index操作方法
     */
    public function index() {
        
        //重定向
        //$this->redirect('edit','',2,'纯跳转');
        //成功提示跳转
        //$this->success('成功跳转',U('User/login'),3);
        //错误提示跳转
        //$this->error('出错了，正在跳转',U('User/login'),5);
        //Ajax数据返回
        //$this->ajaxReturn(getTestData(),'xml');
        
        $server = I('server.HTTP_HOST');
        dump($server);
    }
    
    /**
     * edit操作方法
     */
    public function edit() {
        echo "user.edit";
    }
    
    /**
     * login操作方法
     */
    public function login() {
        
        //获取user get变量
        $user = I('get.user', null);
        
        if ($user === 'jike') {
            $this->success('您好极客', U('User/index') , 3);
        } 
        else {
            $this->error('您不是极客', U('User/index') , 3);
        }
    }
}
