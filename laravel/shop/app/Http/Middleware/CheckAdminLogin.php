<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    //检测用户是否登录了的中间件
    public function handle($request, Closure $next)
    {
        $admin=$request->session()->get('admin','');
        if($admin==''){
            //要是用户不在线的话就跳转了
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
