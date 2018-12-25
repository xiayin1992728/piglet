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
                'auth_icon' => 'layui-icon-username',
                'auth_url' => '',
                'create_time' => $time,
            ],
            [
                'name' => '后台列表',
                'auth_parent' => '1',
                'auth_icon' => '1',
                'auth_url' => 'lists',
                'create_time' => $time,
            ],
            [
                'name' => '后台添加',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '后台修改',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '后台删除',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],

            [
                'name' => '前台列表',
                'auth_parent' => '1',
                'auth_icon' => '1',
                'auth_url' => 'users',
                'create_time' => $time,
            ],
            [
                'name' => '前台添加',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '前台修改',
                'auth_parent' => '1',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '前台删除',
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
                'auth_parent' => '10',
                'auth_icon' => '10',
                'auth_url' => 'role',
                'create_time' => $time,
            ],
            [
                'name' => '角色添加',
                'auth_parent' => '10',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '角色修改',
                'auth_parent' => '10',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '角色删除',
                'auth_parent' => '10',
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
//                'auth_parent' => '15',
//                'auth_icon' => '',
//                'create_time' => $time,
//            ],
//            [
//                'name' => '权限添加',
//                'auth_parent' => '15',
//                'auth_icon' => '',
//                'create_time' => $time,
//            ],
//            [
//                'name' => '权限修改',
//                'auth_parent' => '15',
//                'auth_icon' => '',
//                'create_time' => $time,
//            ],
//            [
//                'name' => '权限删除',
//                'auth_parent' => '15',
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
                'auth_parent' => '15',
                'auth_icon' => '15',
                'auth_url' => 'product',
                'create_time' => $time,
            ],
            [
                'name' => '产品添加',
                'auth_parent' => '15',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品修改',
                'auth_parent' => '15',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品删除',
                'auth_parent' => '15',
                'auth_icon' => '',
                'create_time' => $time,
            ],
            [
                'name' => '产品查看',
                'auth_parent' => '15',
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
                'auth_parent' => '21',
                'auth_icon' => '21',
                'auth_url' => 'category',
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
            [
                'name' => '标签管理',
                'auth_parent' => '0',
                'auth_icon' => 'layui-icon-template-1',
                'create_time' => $time
            ],
            [
                'name' => '标签列表',
                'auth_parent' => '26',
                'auth_icon' => '26',
                'auth_url' => 'tag',
                'create_time' => $time
            ],
            [
                'name' => '标签添加',
                'auth_parent' => '26',
                'auth_icon' => '',
                'create_time' => $time
            ],
            [
                'name' => '标签修改',
                'auth_parent' => '26',
                'auth_icon' => '',
                'create_time' => $time
            ],
            [
                'name' => '标签删除',
                'auth_parent' => '26',
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
                'auth_parent' => '31',
                'auth_icon' => '31',
                'auth_url' => 'setting/carousel',
                'create_time' => $time,
            ],
        ];

        $this->table('auths')->insert($data)->save();
    }
}