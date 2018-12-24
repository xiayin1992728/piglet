<?php
namespace app\index\controller;

use think\Controller;
use app\common\model\Category as CategoryModel;
use app\common\model\Product;
use think\Request;

class Category extends Controller
{
    public function index()
    {
       $products = ($category = CategoryModel::where('name','为我推荐')->find()) ? $category->product()->order('update_time desc')->limit(0,6)->select() : [];
        return $this->fetch('category/index',[
            'products' => $products,
        ]);
    }

    public function category($category)
    {
        $category = CategoryModel::where('name',$category)->find();
        $products = $category ? $category->product()->order('update_time desc')->limit(0,6)->select() : [];

        if (empty($products)) {
            return ['status' => 402,'msg' => '没有更多数据'];
        } else {
            foreach ($products as $key => $vo) {
                $products[$key]['tag'] = $vo->tag;
            }
            return ['status' => 200,'data' => $products];
        }
    }

    public function productScreen(Request $request)
    {

        $where = [
          'money_section' => $request->get('money'),
          'period_section' => $request->get('time'),
            'card' => $request->get('card'),
        ];
        $category = Product::where($where)->select();
        if (empty($category)) {
            return ['status' => 402,'msg' => '没有数据'];
        } else {
            foreach ($category as $key => $vo) {
                $category[$key]['tag'] = $vo->tag;
            }
            return ['status' =>200,'data' => $category];
        }

    }
}