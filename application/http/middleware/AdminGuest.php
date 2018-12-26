<?php

namespace app\http\middleware;

use think\facade\Session;

class AdminGuest
{
    public function handle($request, \Closure $next)
    {
        if (Session::get('admin','admin')) {
            return redirect('/admin');
        }

        return $next($request);
    }
}
