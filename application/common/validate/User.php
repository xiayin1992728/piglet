<?php

namespace app\common\validate;

use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'alias' => 'require',
        'phone' => 'require',
        'avatar' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'alias.require' => '昵称不能为空',
        'avatar.require' =>'头像不能为空',
    ];

    public function sceneUpdate($id)
    {
        return $this->only(['alias','avatar'])
            ->append('alias', 'unique:users,alias,'.$id.',id');
    }


    public function sceneUpdates($id)
    {
        return $this->only(['alias','avatar','phone'])
            ->append('alias', 'unique:users,alias,'.$id.',id')
            ->append('phone', 'unique:users,phone,'.$id.',id');
    }

    public function sceneSave()
    {
        return $this->only(['alias','avatar','phone'])
                    ->append('alias','unique:users,alias')
                    ->append('phone','unique:users');
    }
}
