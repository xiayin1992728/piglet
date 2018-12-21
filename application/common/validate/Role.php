<?php

namespace app\common\validate;

use think\Validate;

class Role extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'name' => [
	        'require',
        ],
        'auth' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.require' => '请输入角色名称',
        'name.unique' => '角色已存在',
        'auth.require' => '请选择权限'
    ];

    public function sceneSave()
    {
        return $this->only(['name','auth'])
            ->append('name','unique:roles');
    }

    public function sceneUpdate($id)
    {
        return $this->only(['name','auth'])
            ->append('name','unique:roles,name,'.$id.',id');
    }
}
