<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected $table = 'categorys';
    protected $observerClass = 'app\common\observer\Category';

    public function product()
    {

        return $this->hasMany('Product','category_id','id');
    }
}