<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Product as ProductModel;
use app\common\validate\Product as ProductVlidate;
use app\common\model\Category;
use app\common\model\Tag;
use think\facade\Env;
use think\Request;

class Product extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(ProductModel $product)
    {
        $products = $product->paginate(10);
        $this->assign('products', $products);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create(Category $category, Tag $tag)
    {
        $categorys = $category->all();
        $tags = $tag->all();
        $this->assign('categorys', $categorys);
        $this->assign('tags', $tags);
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(ProductModel $product, ProductVlidate $validate)
    {
        if (!$validate->sceneSave()->check($this->request->post())) {
            return ['status' => 402, 'msg' => $validate->getError()];
        }

        $data = $this->request->post();
        $data['create_time'] = date('Y-m-d H:i:s', time());

        if ($product->allowField(true)->save($data)) {
            // 添加 product_tags中间表数据
            foreach ($data['tag'] as $v) {
                $product->tag()->attach($v);
            }
            // 添加 product_category 中间表数据
            foreach ($data['category'] as $vo) {
                $product->category()->attach($vo);
            }
            return ['status' => 200, 'msg' => '添加成功'];
        } else {
            return ['status' => 402, 'msg' => '添加失败'];
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        $product = ProductModel::get($id);
        $categorys = Category::all();
        $tags = Tag::all();
        $this->assign('product', $product);
        $this->assign('categorys', $categorys);
        $this->assign('tags', $tags);
        return $this->fetch();
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $product = ProductModel::get($id);
        $categorys = Category::all();
        $tags = Tag::all();
        $money_section = [
            '不限金额',
            '0~3千',
            '3千~5千',
            '5千~1万',
            '1万~3万',
            '3万~5万',
            '5万以上'
        ];
        $period_section = [
            '不限期限',
            '0~1个月',
            '1~3个月',
            '3~6个月',
            '6~12个月',
            '12~36个月',
            '36个月以上'
        ];
        $card = [
            '不限身份',
            '上班族',
            '学生党',
            '生意人',
            '自由职业'
        ];
        $this->assign('money_section', $money_section);
        $this->assign('period_section', $period_section);
        $this->assign('card', $card);
        $this->assign('product', $product);
        $this->assign('categorys', $categorys);
        $this->assign('tags', $tags);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(ProductModel $product, ProductVlidate $validate, $id)
    {
        if (!$validate->sceneUpdate($id)->check($this->request->put())) {
            return ['status' => 200, 'msg' => $validate->getError()];
        }
        $data = $this->request->put();
        if ($product->allowField(true)->save($data, ['id' => $id])) {
            // 修改中间表 product_tags
            $data['tag'] = $data['tag'] ?? [];
            $product = $product->get($id);
            $product->tag()->detach($product->tag->column('id'));
            $product->category()->detach($product->category->column('id'));
            foreach ($data['tag'] as $v) {
                $product->tag()->attach($v);
            }
            foreach ($data['category'] as $vo) {
                $product->category()->attach($vo);
            }
            return ['status' => 200, 'msg' => '修改成功 '];
        } else {
            return ['status' => 402, 'msg' => '修改失败'];
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete(ProductModel $product, $id)
    {
        $product = $product->get($id);
        if ($product->delete()) {
            $product->tag()->detach($product->tag->column('id'));
            $product->category()->detach($product->category->column('id'));
            return ['status' => 200, 'msg' => '删除成功'];
        } else {
            return ['status' => 402, 'msg' => '删除失败'];
        }
    }

    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $dirs = '/uploads/products';
        $info = $file->move(Env::get('root_path') . 'public/' . $dirs);
        if ($info) {
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $path = $dirs . '/' . $info->getSaveName();
            return ['status' => 200, 'data' => $path];
        } else {
            // 上传失败获取错误信息
            return ['status' => 402, 'msg' => $file->getError()];
        }
    }

    public function search(Request $request)
    {
        //halt($request->post());
        $data = array_filter($request->post());
        $item = [
            'start' => ['update_time','>',$request->post('start')],
            'end' => ['update_time','<',$request->post('end')],
            'name' => ['name','like','%'.$request->post('name').'%'],
        ];
        $where = [];
        foreach ($item as $k => $v) {
            if (array_key_exists($k,$data)) {
                $where[] = $v;
            }
        }
        $products = ProductModel::where($where)->select();

        //halt(ProductModel::getLastSql());
        return $this->fetch('product/search',['products' => $products]);
    }
}
