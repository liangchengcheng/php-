<?php
/**
 * Created by PhpStorm.
 * User: lcc
 * Date: 16/4/7
 * Time: 上午7:36
 */
namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{

    //在登录的场景开放的字段
    //在注册的时候开放的字段
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['login'] = ['username', 'password'];
        $scenarios['register'] = ['username', 'email', 'password'];
        return $scenarios;
    }


//    public function rules()
//    {
//        return [
//            // name, email, subject 和 body 属性必须有值
//            [['name', 'email', 'subject', 'body'], 'required'],
//
//            // email 属性必须是一个有效的电子邮箱地址
//            ['email', 'email'],
//        ];
//    }



//
//      一条规则可用来验证一个或多个属性，一个属性可对应一条或多条规则。
//
//      更多关于如何申明验证规则的详情请参考 验证输入 一节.
//
//      有时你想一条规则只在某个 场景 下应用，为此你可以指定规则的 on 属性
    public function rules()
    {
        return [
            // 在"register" 场景下 username, email 和 password 必须有值
            [['username', 'email', 'password'], 'required', 'on' => 'register'],

            // 在 "login" 场景下 username 和 password 必须有值
            [['username', 'password'], 'required', 'on' => 'login'],
        ];
    }
}