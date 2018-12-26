<?php
namespace app\index\controller;

use think\Controller;
use app\common\model\Product as ProductModel;

class Product extends Controller
{
    protected $middleware = [
            'user' => ['except' => ['products']]
    ];

    public function product ($id)
    {

        $product = ProductModel::get($id);
        $count = ProductModel::count('id');

        $easy = ProductModel::whereIn('id',[random_int(1,$count),random_int(1,$count)])->select();

        return $this->fetch('product',['easy' => $easy,'product' => $product]);
    }

    public function products ()
    {
        $products = ProductModel::limit(0,100)->order('update_time desc')->select();
        if ($products) {
            return ['status' => 200,'data' => $products];
        } else {
            return ['status' => 402,'msg' => '没有更多数据'];
        }
    }
}