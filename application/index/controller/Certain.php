<?php
/**
 * Created by PhpStorm.
 * User: xia
 * Date: 2018/12/26
 * Time: 11:44
 */

namespace app\index\controller;

use think\Controller;
use app\common\model\Category;

class Certain extends Controller
{
    public function index($id)
    {
        $products = ($category = Category::where('id',$id)->find()) ? $category->product()->order('update_time desc')->select() : [];
        if (!empty($products)) {
            foreach ($products as $key => $vo) {
                $products[$key]['tag'] = $vo->tag;
            }
        }
        $this->assign('products',$products);
        return $this->fetch();
    }
}