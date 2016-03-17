<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    //检测用户是否登录了的中间件
    public function handle($request, Closure $next)
    {
        $http_referer = $_SERVER['HTTP_REFERER'];
        $member=$request->session()->get('member','');
        if($member==''){
            //要是用户不在线的话就跳转了
            return redirect('/login?return_url='.urlencode($http_referer));
        }
        return $next($request);
    }
}
