<?php

namespace app\common\validate;

use think\Validate;

class Sessions extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'phone' => [
	        'require',
            'regex' => '^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$',
        ],
        'captcha' => 'require|captcha'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'phone.require' => '请输入手机号码',
        'phone.regex' => '手机格式错误',
        'captcha.require' => '验证码不能为空',
        'captcha.captcha' => '验证码错误',
    ];

    protected $scene = [
        'login' => ['phone','captcha']
    ];
}
