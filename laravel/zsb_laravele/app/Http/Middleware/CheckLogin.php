<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\M3Result;

class CheckLogin
{
    //检测用户是否登录了的中间件
    public function handle($request, Closure $next)
    {
        $token= $request->input('token');
        if($token==''){
            //要是用户不在线的话就跳转了
            $m3_result = new M3Result;
            $m3_result->status = 3;
            $m3_result->message = "用户不在线";
            return $m3_result->toJson();
        }
        return $next($request);
    }
}
