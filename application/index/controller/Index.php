<?php
namespace app\index\controller;

use think\Controller;
use app\common\model\Product;
use app\common\model\Category;

class Index extends Controller
{
    public function index()
    {

        $advert = ($category = Category::where('name','一定贷到钱')->find()) ? $category->product()->order('update_time desc')->limit(0,6)->select() : [] ;

        $second = ($second = Category::where('name','秒下款产品')->find()) ? $second->product()->order('update_time desc')->limit(0,4)->select() : [];

        $hot = ($hot = Category::where('name','爆款新产品')->find()) ? $hot->product()->order('update_time desc')->limit(0,4)->select() : [];

        $card = ($card = Category::where('name','凭身份证下款')->find()) ? $card->product()->order('update_time desc')->limit(0,3)->select() : [];

        $bill = ($bill = Category::where('name','3分钟下款')->find()) ? $bill->product()->order('update_time desc')->find() : [];

        return $this->fetch('index/index',[
            'advert' => $advert,
            'second' => $second,
            'hot' => $hot,
            'card' => $card
        ]);
    }
}
