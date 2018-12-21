<?php

namespace app\common\model;

use think\Model;

class Tag extends Model
{
    protected $table = 'tags';

    public function product()
    {
        return $this->belongsToMany('Product','product_tags','product_id','tag_id');
    }
}
