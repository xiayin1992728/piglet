<?php

namespace app\index\controller;

use think\App;
use think\Controller;
use think\Request;
use app\common\validate\Sessions as SessionsValidate;
use Overtrue\EasySms\EasySms;
use think\facade\Config;
use think\facade\Cache;
use app\common\model\User;
use think\facade\Session;

class Sessions extends Controller
{

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        Session::init([
            'prefix'         => 'user',
            'type'           => '',
            'expire'         => '3600',
            'auto_start'     => true,
        ]);
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch();
    }

    public function message(Request $request,SessionsValidate $validate)
    {
        // 验证数据
        $data = $request->post();

        if (!$validate->scene('login')->check($data)) {
            Session::flash('error',$validate->getError());
            return redirect('/index/login');
        }

        // 发送验证码
        $easySms = new EasySms(Config::get('easysms.'));

        if (env('LOCAL')) {
            $number = '1234';
        } else {
            $number = random_int(1000,9999);
            try {
                $easySms->send($data['phone'], [
                    'template' => env('TEMPLATE'),
                    'data' => [
                        'code' => $number
                    ],
                ]);
            } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $e) {
                Session::flash('error','位置错误请联系管理员');
                return redirect('/index/login');
            }
        }

        // 将验证码存入缓存
        $key = $data['phone']. random_int(99999,100000);
        Cache::set($key,['code' => $number,'phone' => $data['phone']],300);

        $this->assign('key',$key);
        return $this->fetch();
    }

    public function messageValidate(Request $request)
    {
        $this->validate($request->post(),[
           'value' => 'require',
        ],[
            'value.require' => '请输入短信验证码'
        ]);

        $key = $request->post('key');
        $value = $request->post('value');
        $data = Cache::get($key);

        if (!Cache::get($key)) {
            Session::flash('error','短信验证码过期');
            return redirect('/index/login');
        }

        if (!$data['code'] == $value) {
            Session::flash('error','短信验证码错误');
            return redirect('/index/message');
        }

        // 用户存在登录 不存在创建用户
        $phone = $data['phone'];
        $user = User::where('phone',$phone)->find();
        if (!$user) {
            // 创建用户
            $user = [
                'phone' => $phone,
                'name' => $this->randStr(),
                'avatar' => '/static/index/images/person/default.png',
                'create_time' => date('Y-m-d H:i:s',time())
            ];
            $user = User::create($user);
        }

        // 存入 session
        Session::set('user',$user,'user');
        return redirect('/person');
    }

    protected function randStr()
    {
        $str = 'qwertyuiopasdfghjklzxcvbnm';
        $res = '';
        for($i=0;$i<6;$i++) {
            $res .= $str[random_int(0,24)];
        }

        return $res;
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {
        Session::delete('user','user');
        return redirect('/');
    }
}
