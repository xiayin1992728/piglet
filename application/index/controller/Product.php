<?php
namespace app\index\controller;

use think\Controller;
use app\common\model\Product as ProductModel;

class Product extends Controller
{
    protected $middleware = [
            'user'
    ];

    public function product ($id)
    {

        $product = ProductModel::get($id);
        $count = ProductModel::count('id');

        $easy = ProductModel::whereIn('id',[random_int(1,$count),random_int(1,$count)])->select();

        return $this->fetch('product',['easy' => $easy,'product' => $product]);
    }
}