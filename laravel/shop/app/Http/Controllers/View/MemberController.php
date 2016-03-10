<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;

class MemberController extends Controller
{
  public function toLogin(Request $request)
  {
    //获取请求的return_url
    $return_url=$request->input('return_url','');
    return view('login')->with('return_url',urlencode($return_url));
  }

  public function toRegister($value='')
  {
    return view('register');
  }
}
