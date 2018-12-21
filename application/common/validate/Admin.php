<?php

namespace app\common\validate;

use think\Validate;

class Admin extends Validate
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
            'regex' => '^((13[0-9])|(14[5,7,9])|(15[^4])|(18[0-9])|(17[0,1,3,5,6,7,8]))\\d{8}$',
        ],
        'role_id' => ['require'],
        'password' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'phone.require' => '请输入手机号',
        'phone.regex' => '手机格式错误',
        'phone.unique' => '手机号已存在',
        'role_id.require' => '请选择角色',
        'password.require' => '请输入密码'
    ];

    protected $scene = [
        'save' => ['phone','role_id','password'],
    ];

    public function sceneUpdate($id)
    {
       return $this->only(['phone','role_id','password'])
            ->append('phone','unique:admins,phone,'.$id.',id');
    }

    public function sceneSave()
    {
        return $this->only(['phone','role_id','password'])
            ->append('phone','unique:admins');
    }
}
