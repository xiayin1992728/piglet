<?php

use think\migration\Seeder;

class AuthSeeder extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $time = date('Y-m-d H:i:s',time());
        $data = [
            [
                'name' => '用户管理',
                'auth_parent' => '0',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '管理列表',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '管理添加',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '管理修改',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '管理删除',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '角色管理',
                'auth_parent' => '0',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '角色列表',
                'auth_parent' => '6',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '角色添加',
                'auth_parent' => '6',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '角色修改',
                'auth_parent' => '6',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '角色删除',
                'auth_parent' => '6',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '权限管理',
                'auth_parent' => '0',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '权限列表',
                'auth_parent' => '11',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '权限添加',
                'auth_parent' => '11',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '权限修改',
                'auth_parent' => '11',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '权限删除',
                'auth_parent' => '11',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品管理',
                'auth_parent' => '0',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品列表',
                'auth_parent' => '16',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品添加',
                'auth_parent' => '16',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品修改',
                'auth_parent' => '16',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品删除',
                'auth_parent' => '16',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '分类管理',
                'auth_parent' => '0',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '分类列表',
                'auth_parent' => '21',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '分类添加',
                'auth_parent' => '21',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '分类修改',
                'auth_parent' => '21',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '分类删除',
                'auth_parent' => '21',
                'auth_icon' => '',
                'create_time' => $time,
            ],
        ];

        $this->table('auths')->insert($data)->save();
    }
}