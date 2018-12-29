<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Product extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $table = 'products';

    public function category()
    {
        return $this->belongsToMany('Category','product_category','category_id','product_id');
    }

    public function tag()
    {
        return $this->belongsToMany('Tag','product_tags','tag_id','product_id');
    }

    public function getName()
    {
        return implode('|',$this->category()->column('name'));
    }
}