<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\User as UserModel;
use app\common\validate\User as UserValidate;

class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $user = UserModel::paginate(10);
        $this->assign('user',$user);
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
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request,UserModel $user,UserValidate $validate)
    {
        $data = $request->post();
        $data['create_time'] = date('Y-m-d H:i:s',time());
        if (!$validate->sceneSave()->check($data)) {
            return ['status' => 402,'msg' => $validate->getError()];
        }

        if ($user->allowField(true)->save($data)) {
            return ['status' => 200,'msg' => '添加成功'];
        } else {
            return ['status' => 402,'msg' => '添加失败'];
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $user = UserModel::get($id);
        $this->assign('user',$user);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, UserModel $user,UserValidate $validate,$id)
    {
        $data = $request->put();
        if (!$validate->sceneUpdates($id)->check($data)) {
            return ['status' => 402,'msg' => $validate->getError()];
        }

        if ($user->allowField(true)->save($data,['id' => $id])) {
            return ['status' => 200,'msg' => '修改成功'];
        } else {
            return ['status' => 402,'msg' =>'修改失败'];
        }

    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(UserModel $user,$id)
    {
        $user = $user->get($id);
        if ($user->delete()) {
            return ['status'=> 200,'msg' =>'删除成功'];
        } else {
            return ['status' => 402,'msg' => '删除失败'];
        }
    }

    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( env('root_path').'public/uploads/user');
        if($info){
            return ['status' => 200,'data' => 'uploads/user/'.$info->getSaveName()];
        }else{
            // 上传失败获取错误信息
            return ['status' => 402,'msg' => $file->getError()];
        }
    }
}
