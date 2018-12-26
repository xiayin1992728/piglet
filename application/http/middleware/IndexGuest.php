<?php

namespace app\http\middleware;

use think\facade\Session;

class IndexGuest
{
    public function handle($request, \Closure $next)
    {
        if (Session::get('user','user')) {
            return redirect('/person');
        }

        return $next($request);
    }
}
