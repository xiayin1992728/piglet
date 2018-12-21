<?php

namespace app\http\middleware;

use app\common\model\Admin;
use think\facade\Session;

class Auth
{
    public function handle($request, \Closure $next)
    {
        //halt($request->routeInfo()['route']);
        if (!Session::get('admin','admin')) {
            return redirect('/login');
        }

        // 更新 session
        Session::set('admin',Admin::get(Session::get('admin','admin')->id),'admin');

        return $next($request);
    }
}
