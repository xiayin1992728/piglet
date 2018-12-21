<?php

namespace app\common\validate;

use think\Validate;

class Category extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'name' => 'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.require' => '请输入分类名称'
    ];

    public function sceneSave()
    {
        return $this->only(['name'])
                    ->append('name','unique:categorys');
    }

    public function sceneUpdate($id)
    {
        return $this->only(['name'])
                    ->append('name','unique:categorys,name,'.$id.',id');
    }
}
