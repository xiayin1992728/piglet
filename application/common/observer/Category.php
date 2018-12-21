<?php
/**
 * Created by PhpStorm.
 * User: xia
 * Date: 2018/12/18
 * Time: 14:50
 */

namespace app\common\observer;

use app\common\model\Category as CategoryModel;
use think\Db;

class Category
{
    public function afterDelete(CategoryModel $category)
    {
        Db::table('products')->where('category_id',$category->id)->update(['category_id'=>'']);
    }
}