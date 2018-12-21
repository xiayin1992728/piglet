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
                'name' => '后台用户',
                'auth_parent' => '0',
                'auth_icon' => 'layui-icon-username',
                'auth_url' => '',
                'create_time' => $time,
            ],
            [
                'name' => '用户列表',
                'auth_parent' => '1',
                'auth_icon' => '1',
                'auth_url' => 'lists',
                'create_time' => $time,
            ],
            [
                'name' => '用户添加',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '用户修改',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '用户删除',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '角色管理',
                'auth_parent' => '0',
                'auth_icon' => 'layui-icon-auz',
                'create_time' => $time,
            ],
            [
                'name' => '角色列表',
                'auth_parent' => '6',
                'auth_icon' => '6',
                'auth_url' => 'role',
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

//            [
//                'name' => '权限管理',
//                'auth_parent' => '0',
//                'auth_icon' => '',
//                'create_time' => $time,
//            ],
//            [
//                'name' => '权限列表',
//                'auth_parent' => '11',
//                'auth_icon' => '',
//                'create_time' => $time,
//            ],
//            [
//                'name' => '权限添加',
//                'auth_parent' => '11',
//                'auth_icon' => '',
//                'create_time' => $time,
//            ],
//            [
//                'name' => '权限修改',
//                'auth_parent' => '11',
//                'auth_icon' => '',
//                'create_time' => $time,
//            ],
//            [
//                'name' => '权限删除',
//                'auth_parent' => '11',
//                'auth_icon' => '',
//                'create_time' => $time,
//            ],

            [
                'name' => '产品管理',
                'auth_parent' => '0',
                'auth_icon' => 'layui-icon-app',
                'create_time' => $time,
            ],
            [
                'name' => '产品列表',
                'auth_parent' => '11',
                'auth_icon' => '11',
                'auth_url' => 'product',
                'create_time' => $time,
            ],
            [
                'name' => '产品添加',
                'auth_parent' => '11',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品修改',
                'auth_parent' => '11',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品删除',
                'auth_parent' => '11',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品查看',
                'auth_parent' => '11',
                'auth_icon' => '',
                'create_time' => $time,
            ],

            [
                'name' => '分类管理',
                'auth_parent' => '0',
                'auth_icon' => 'layui-icon-list',
                'create_time' => $time,
            ],
            [
                'name' => '分类列表',
                'auth_parent' => '17',
                'auth_icon' => '17',
                'auth_url' => 'category',
                'create_time' => $time,
            ],
            [
                'name' => '分类添加',
                'auth_parent' => '17',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '分类修改',
                'auth_parent' => '17',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '分类删除',
                'auth_parent' => '17',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '标签管理',
                'auth_parent' => '0',
                'auth_icon' => 'layui-icon-template-1',
                'create_time' => $time
            ],
            [
                'name' => '标签列表',
                'auth_parent' => '22',
                'auth_icon' => '22',
                'auth_url' => 'tag',
                'create_time' => $time
            ],
            [
                'name' => '标签添加',
                'auth_parent' => '22',
                'auth_icon' => '',
                'create_time' => $time
            ],
            [
                'name' => '标签修改',
                'auth_parent' => '22',
                'auth_icon' => '',
                'create_time' => $time
            ],
            [
                'name' => '标签删除',
                'auth_parent' => '22',
                'auth_icon' => '',
                'create_time' => $time
            ],
            [
                'name' => '系统设置',
                'auth_parent' => '0',
                'auth_icon' => 'layui-icon-set',
                'create_time' => $time,
            ],
            [
                'name' => '轮播设置',
                'auth_parent' => '27',
                'auth_icon' => '27',
                'auth_url' => 'setting/carousel',
                'create_time' => $time,
            ],
        ];

        $this->table('auths')->insert($data)->save();
    }
}