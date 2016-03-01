<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
   public function index(){

       //你也可以直接职业
       $data=[
           'name'=>'黎明',
            'age'=>50
       ];
        //return view("user")->with('name','梁铖城');
        return view("user")->with('data',$data);
   }
}
