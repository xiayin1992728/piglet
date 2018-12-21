<?php
namespace app\admin\controller;

use think\Controller;
use app\common\model\Category as CategoryModel;
use app\common\validate\Category as CategoryValidate;

class Category extends Controller
{
    public function index(CategoryModel $category)
    {
        $category = $category->paginate(10);
        $this->assign('category',$category);
        return $this->fetch();
    }

    public function create()
    {

        return $this->fetch();
    }

    public function save(CategoryModel $category,CategoryValidate $validate)
    {
        // 验证数据
        if (!$validate->sceneSave()->check($this->request->post())) {
            return ['status' => 402,'msg' => $validate->getError()];
        }

        // 添加数据
        $category->name = $this->request->post('name');
        $category->create_time = date('Y-m-d H:i:s',time());
        if ($category->save()) {
            return ['status' => 200,'msg' => '添加成功'];
        } else {
            return ['status' => 402,'msg' => '添加失败'];
        }

    }

    public function edit(CategoryModel $category,$id)
    {
        $category = $category->get($id);
        $this->assign('category',$category);
        return $this->fetch();
    }

    public function update(CategoryModel $category,CategoryValidate $validate,$id)
    {
        if (!$validate->sceneUpdate($id)->check($this->request->put())) {
            return ['status' => 402,'msg' => $validate->getError()];
        }

        $category = $category->get($id);
        $category->name = $this->request->put('name');
        if ($category->save()) {
            return ['status' => 200,'msg'=> '修改成功'];
        } else {
            return ['status' => 402,'msg' => '修改失败'];
        }
    }

    public function delete(CategoryModel $category,$id)
    {
        $category = $category->get($id);
        if ($category->delete()) {
            return ['status' => 200, 'msg' => '删除成功'];
        } else {
            return ['status' => 402, 'msg' => '删除失败'];
        }
    }
}