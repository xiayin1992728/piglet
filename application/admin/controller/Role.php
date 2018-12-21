<?php

namespace app\admin\controller;

use app\common\model\Auth;
use app\common\model\Role as RoleModel;
use app\common\validate\Role as RoleValidate;
use think\Controller;

class Role extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(RoleModel $role)
    {
        $roles = $role->paginate(10);
        $this->assign('roles',$roles);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create(Auth $auth)
    {
        $auths = $auth->where('auth_parent',0)->select();
        $this->assign('auths',$auths);
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(RoleModel $role,RoleValidate $validate)
    {
        // 验证数据
        if (!$validate->sceneSave()->check($this->request->post())) {
            return ['status' => 402,'msg' => $validate->getError()];
        }

        // 添加角色
        $role->name = $this->request->post('name');
        $role->create_time = date('Y-m-d H:i:s',time());
        $role->save();

        // 给角色添加权限
        $res = null;
        foreach ($this->request->post('auth') as $key => $vo) {
            if (!empty($vo)) {
                $res = $role->auth()->attach($key);
            }
            foreach ($vo as $v) {
                $res = $role->auth()->attach($v);
            }
        }
        if ($res) {
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
        $role = RoleModel::get($id);
        $auths = Auth::where('auth_parent',0)->select();
        $owner = $role->auth->column('id');
        $this->assign('role',$role);
        $this->assign('auths',$auths);
        $this->assign('owner',$owner);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(RoleModel $role,RoleValidate $validate,$id)
    {
        // 验证数据
        if (!$validate->sceneUpdate($id)->check($this->request->put())) {
            return ['status' => 402,'msg' =>$validate->getError()];
        }

        $role = $role->get($id);
        //  获取原有权限
        $owner = $role->auth->column('id');
        // 删除原有权限
        $role->auth()->detach($owner);

        // 加入新的权限
        $res = null;
        foreach ($this->request->put('auth') as $key => $vo) {
            if (!empty($vo)) {
                $res = $role->auth()->attach($key);
            }
            foreach ($vo as $v) {
                $res = $role->auth()->attach($v);
            }
        }
        if ($res) {
            return ['status' => 200,'msg' => '修改成功'];
        } else {
            return ['status' => 402,'msg' => '修改失败'];
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(RoleModel $role,$id)
    {
        $role = $role->get($id);
        $owner = $role->auth->column('id');
        if ($role->delete() && $role->auth()->detach($owner)) {
            return ['status' =>200,'msg' => '删除成功'];
        } else {
            return ['status' => 402,'msg' => '删除失败'];
        }
    }
}
