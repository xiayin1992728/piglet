<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected $table = 'categorys';
    protected $observerClass = 'app\common\observer\Category';

    public function product()
    {

        return $this->belongsToMany('Product','product_category','product_id','category_id');
    }
}