<?php
/**
 * Created by PhpStorm.
 * User: xia
 * Date: 2018/12/14
 * Time: 11:26
 */
namespace app\admin\controller;

use app\common\model\Admin;
use think\App;
use think\Controller;
use think\facade\Session;

class Login extends Controller
{
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        Session::init([
            'prefix'         => 'admin',
            'type'           => '',
            'auto_start'     => true,
        ]);
    }

    public function login()
    {
        return $this->fetch();
    }

    public function loginCheck(Admin $admin)
    {
        $data = $this->request->post();
        // 验证数据
        $validate = $this->validate($data,
            [
                'phone' => 'required',
                'password' => 'required',
            ],
            [
                'password.required' => '密码不能为空',
                'phone.required' => '手机不能为空'
            ]);

        if (!$validate) {
            return ['status' => 401,'msg' => $validate];
        }

        $res = $admin->where('phone',$data['phone'])->find();
        //halt($res);
        if (!$res) {
            return ['status' => 401,'msg' => '用户不存在'];
        } else if(!hash_equals($res->password,md5(md5($data['password'])))) {
            return ['status' => 401,'msg' => '密码错误'];
        } else {
            // 存入 session
            Session::set('admin',$res,'admin');
            return ['status' => 200,'msg' => '登录成功'];
        }
    }
}