<?php
namespace app\index\controller;

use think\Controller;
use app\common\model\Product;
use app\common\model\Category;

class Index extends Controller
{
    public function index(Product $product,Category $category)
    {
        $category = $category->where('name','一定贷到钱')->find();

        $advert = $category ? $category->product()->order('update_time desc')->find() : [] ;

        return $this->fetch('index/index',[
            'advert' => $advert,
        ]);
    }
}
