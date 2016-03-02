<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class testController extends BaseController
{
    public function index()
    {

        //$user=new \App\User();
        //$name = $user->all();
        //$name=Input::get('name');
        //$name=Request::all();

        //过滤属性
        //$name=Request::only('name','age');

        //$name=Request::except('name');

        //整个url
        //$name=Request::fullurl();

        //获取名字
        //$name=Request::file('profile')->getClientOriginalName();
        //$name=Request::file('profile');

        //session
         //Session::put('username','lcc');
        //Session::all();
        //Session::get('username');

        $rq=Request::all();

        $validator=validator::make($rq,[
            'name'=>'required',
            'phone'=>'numeric|required|min:10|between:10,32'
        ]);

        if($validator->fails()){
            $name= $validator->errors();
        }else{
            $name= '验证成功';
        }

        return view("test")->with('name', $name);
    }
}
