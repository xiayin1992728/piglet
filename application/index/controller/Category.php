<?php
namespace app\index\controller;

use think\Controller;
use app\common\model\Category as CategoryModel;

class Category extends Controller
{
    public function index()
    {
       $products = ($category = CategoryModel::where('name','为我推荐')->find()) ? $category->product()->order('update_time desc')->limit(0,6)->select() : [];

        return $this->fetch('category/index',[
            'products' => $products
        ]);
    }
}