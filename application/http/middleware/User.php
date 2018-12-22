<?php

namespace app\http\middleware;

use think\facade\Session;
use app\common\model\User as UserModel;

class User
{
    public function handle($request, \Closure $next)
    {
        if (!Session::get('user','user')) {
            return redirect('/index/login');
        }

        $user = UserModel::get(Session::get('user','user')->id);
        Session::set('user',$user,'user');

        return $next($request);
    }
}
