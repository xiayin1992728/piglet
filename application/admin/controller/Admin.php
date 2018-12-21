<?php

namespace app\admin\controller;

use app\common\model\Auth;
use app\common\model\Role;
use think\Controller;
use app\common\model\Admin as AdminModel;
use app\common\validate\Admin as AdminValidate;
use think\facade\Session;
use think\facade\Env;

/**
 * 后台用户类
 * Class Admin
 * @package app\admin\controller
 */
class Admin extends Controller
{
    /**
     * 首页
     * @param Auth $auth
     * @param AdminModel $admin
     * @return mixed
     * @throws \think\Exception\DbException
     */
    public function index(Auth $auth, AdminModel $admin)
    {
        // 检查是否是超级管理员
        $id = Session::get('admin', 'admin');

        $admin = $admin->get($id->id);
        if ($admin->role_id === 0) {
            $menu = $auth->all();
        } else {
            $menu = $admin->role ? $admin->role->auth :[];
        }

        $this->assign('menu', $menu);

        return $this->fetch();
    }

    /**
     * 首页欢迎
     * @return mixed
     */
    public function welcome()
    {
        return $this->fetch();
    }

    /**
     * 列表页
     * @param AdminModel $admin
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function lists(AdminModel $admin)
    {
        $admin = $admin->paginate(5);
        $this->assign('admin', $admin);
        return $this->fetch();
    }

    /**
     * 添加视图页
     * @param Role $roles
     * @return mixed
     * @throws \think\Exception\DbException
     */
    public function create(Role $roles)
    {
        $roles = $roles->all();
        $this->assign('roles', $roles);
        return $this->fetch();
    }

    /**
     * 添加保存
     * @param AdminModel $admin
     * @return array
     */
    public function save(AdminModel $admin, AdminValidate $validate)
    {
        // 验证数据
        if (!$validate->sceneSave()->check($this->request->post())) {
            return ['status' => 401, 'msg' => $validate->getError()];
        }

        // 保存
        $data = $this->request->post();
        $data['password'] = md5(md5($data['password']));
        $data['create_time'] = date('Y-m-d H:i:s', time());
        if ($admin->allowField(true)->save($data)) {
            return ['status' => 200, 'msg' => '添加成功'];
        } else {
            return ['status' => 401, 'msg' => '添加失败'];
        }
    }

    /**
     * 删除
     * @param AdminModel $admin
     * @param $id
     * @return array
     */
    public function delete(AdminModel $admin, $id)
    {
        if ($admin::destroy($id)) {
            return ['status' => 200, 'msg' => '删除成功'];
        } else {
            return ['status' => 403, 'msg' => '删除失败'];
        }
    }

    public function deletes(AdminModel $admin)
    {
        $time = time();
        $ids = $this->request->delete('ids');
        $list = [];
        if (is_array($ids)) {
            foreach ($ids as $id) {
                $list[] = ['id' => $id, 'delete_time' => $time];
            }
        }

        if ($list && $admin->saveAll($list)) {
            return ['status' => 200, 'msg' => '删除成功'];
        } else {
            return ['status' => 403, 'msg' => '删除失败'];
        }
    }

    /**
     * 修改数据
     * @param AdminModel $admin
     * @param $id
     * @param AdminValidate $validate
     * @return array
     * @throws \think\Exception\DbException
     */
    public function update(AdminModel $admin, $id, AdminValidate $validate)
    {
        // 验证数据
        if (!$validate->sceneUpdate($id)->check($this->request->put())) {
            return ['status' => 401, 'msg' => $validate->getError()];
        }
        // 查询用户
        $admin = $admin->get($id);

        // 修改数据
        $data['password'] = md5(md5($data['password']));
        if ($admin->allowField(true)->save($data, ['id' => $id])) {
            return ['status' => 200, 'msg' => '修改成功'];
        } else {
            return ['status' => 401, 'msg' => '修改失败'];
        }
    }

    /**
     * 编辑视图页
     * @param AdminModel $admin
     * @param $id
     * @param Role $role
     * @return mixed
     * @throws \think\Exception\DbException
     */
    public function edit(AdminModel $admin, $id, Role $role)
    {
        $admin = $admin->get($id);
        $roles = $role->all();
        $this->assign('admin', $admin);
        $this->assign('roles', $roles);
        return $this->fetch();
    }

    public function logout()
    {
        Session::delete('admin','admin');
        return ['status' => 200];
    }
}