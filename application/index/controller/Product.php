<?php
namespace app\index\controller;

use think\Controller;

class Product extends Controller
{
    protected $middleware = [
            'user'
    ];

    public function product ()
    {
        $name = '有钱花';
        return $this->fetch('product',['name' => $name]);
    }
}