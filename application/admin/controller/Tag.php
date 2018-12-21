<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Tag as TagModel;
use app\common\validate\Tag as TagValidate;

class Tag extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(TagModel $tag)
    {
        $tags = $tag->paginate(10);
        $this->assign('tags', $tags);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {

        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request, TagValidate $validate, TagModel $tag)
    {
        $data = $request->post();
        if (!$validate->sceneSave()->check($data)) {
            return ['status' => 402, 'msg' => $validate->getError()];
        }
        $data['create_time'] = date('Y-m-d H:i:s', time());
        if ($tag->allowField(true)->save($data)) {
            return ['status' => 200,'msg' => '添加成功'];
        } else {
            return ['status' => 402,'msg' => '添加失败'];
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
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $tag = TagModel::get($id);
        $this->assign('tag',$tag);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request,TagModel $tag,TagValidate $validate, $id)
    {
        $data = $request->put();
        if (!$validate->sceneUpdate($id)->check($data)) {
            return ['status' => 402,'msg' => $validate->getError()];
        }

        if ($tag->allowField(true)->save($data,['id' => $id])) {
            return ['status' => 200,'msg' => '修改成功'];
        } else {
            return ['status' => 402,'msg' => '修改失败'];
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete(TagModel $tag,$id)
    {
        $tag = $tag->get($id);
        if ($tag->delete()) {
            return ['status' => 200,'msg' => '删除成功'];
        } else {
            return ['status' => 402,'msg' => '删除失败'];
        }
    }
}
