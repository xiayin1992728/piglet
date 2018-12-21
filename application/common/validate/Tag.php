<?php

namespace app\common\validate;

use think\Validate;

class Tag extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'name' => 'require',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.require' => '请输入标签名称',
        'name.unique' => '标签名称已存在'
    ];

    public function sceneSave()
    {
        return $this->only(['name'])
            ->append('name','unique:tags');
    }

    public function sceneUpdate($id)
    {
        return $this->only(['name'])
            ->append('name','unique:tags,name,'.$id.',id');
    }
}
