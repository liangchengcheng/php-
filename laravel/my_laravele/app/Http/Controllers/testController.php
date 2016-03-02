<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
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
        $name=Request::file('profile');


        return view("test")->with('name', $name);
    }
}
