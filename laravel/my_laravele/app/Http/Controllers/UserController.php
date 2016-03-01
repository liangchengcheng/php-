<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function index()
    {

        //你也可以直接这样传递
        $data = [
            'name' => '黎明',
            'age' => 50
        ];
        //return view("user")->with('name','梁铖城');
        return view("user")->with('data', $data);
        //你也可以这样
        //return view('user',compact('data'));
    }
}
