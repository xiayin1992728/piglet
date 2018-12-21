<?php

namespace app\common\validate;

use think\Validate;

class Product extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'name' => ['require'],
        'category_id' => ['require'],
        'money' => ['require'],
        'loan_time' => ['require'],
        'interset_rate' => ['require'],
        'loan_period' => ['require'],
        'product_icon' => ['require'],
        'loan_record' => ['number'],
        'product_tag' => ['require','max:20'],
        'product_url' => ['require','max:255'],
        'identity' => ['require','max:20'],
        'auxiliary' => ['require','max:20'],
        'sesame' => ['require','number','max:4'],
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.require' => '请输入产品名称',
        'category_id.require' => '请选择产品分类',
        'money.require' => '请输入可借额度',
        'loan_time.require' => '请输入放款时间',
        'interest_rate.require' => '请输入利率',
        'loan_period.require' => '请输入贷款期限',
        'product_icon.require' => '请上传产品图片',
        'loan_record.number' => '下款人数为数字',
        'product_tag.require' => '请输入产品简介',
        'product_url.require' => '请输入产品链接地址',
        'product_url.max' => '链接地址最大长度 255',
        'identity.require' => '请输入身份证明',
        'auxiliary.require' => '请输入辅助文件',
        'require_age.require' => '请输入年龄范围',
        'sesame.require' => '请输入芝麻分要求',
        'sesame.max' => '芝麻分有误',
    ];


    public function sceneSave()
    {
        return $this->only(['name','category_id','money','loan_time','interest_rate','loan_record','product_url','identity','auxiliary','require_age','sesame'])
            ->append('name','unique:products');
    }

    public function sceneUpdate($id)
    {
        return $this->only(['name','category_id','money','loan_time','interest_rate','loan_record','product_url','identity','auxiliary','require_age','sesame'])
            ->append('name','unique:products,name,'.$id.',id');
    }
}
