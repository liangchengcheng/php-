<?php
namespace Home\Controller;
use Think\Controller;
class userController extends Controller {

    public function index(){

        //各种跳转方式

        $this->redirect('edit','',2,'纯跳转');

        $this->success('成功跳转',U(user/login),2);

        $this->error('出错了','正在跳转',U(user/login),3);

        //ajax json的方式
        $this->ajaxReturn(getTestData(),'json');

        //获取提交的参数
        $server=I('server.HTTP_HOST');
        dump($server);
    }

    public function edit(){
        echo "edit<br>";
    }

    public function login(){
        echo "login<br>";
        $user=I('get.user',null);
        if($user=='lcc'){
            $this->success('成功跳转',U(user/edit),2);
        }else{
            $this->error('出错了','正在跳转',U(user/edit),3);
        }
    }
}