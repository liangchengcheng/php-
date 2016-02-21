<?php
namespace Views\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index() {
        $username = 'linda';
        $email    = 'linda@jike.com';
        $age      = 18;
        
        $user     = array(
            'user' => $username,
            'mail' => $email,
            'age' => $age
        );

        $this->assign('user',$user);

        // $fetchContent=$this->fetch();
        // $fetchContent=str_replace('jike', 'jikexueyuan', $fetchContent);

        // $this->show($fetchContent);

        // $this->assign('user', $username);
        // $this->assign('mail', $email);
        // $this->assign('age', $age);
        
        $this->display();
    }
}
