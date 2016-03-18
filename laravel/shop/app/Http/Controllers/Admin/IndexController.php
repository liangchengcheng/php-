<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Models\M3Result;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    public function login(Request $request)
    {
        $username = $request->input('username', '');
        $password = $request->input('password', '');

        $m3_result = new M3Result();
        if ($username == '' || $password == '') {
            $m3_result->status = 1;
            $m3_result->message = "账号或者密码不能是空的";
            return $m3_result->toJson();
        }
        $admin = Admin::where('username', $username)->where('password', md5('bk' . $password))->first();
        if (!admin) {
            $m3_result->status = 2;
            $m3_result->message = "账号或者密码错误";
        } else {
            $m3_result->status = 2;
            $m3_result->message = "登录成功";
            $request->session()->put('admin', $admin);
        }
        return $m3_result->toJson();
    }

    public function  toLogin()
    {
        return view('admin.login');
    }

    public function toExit(Request $request)
    {
        $request->session()->forget('admin');
        return view('admin.login');
    }

    public function toIndex(Request $request)
    {
        $admin = $request->session()->get('admin');
        return view('admin.index')->with('admin', $admin);

    }

}
