<?php

namespace app\http\middleware;

use think\facade\Session;

class User
{
    public function handle($request, \Closure $next)
    {
        if (!Session::get('user','index')) {
            return redirect('/index/login');
        }

        return $next($request);
    }
}
