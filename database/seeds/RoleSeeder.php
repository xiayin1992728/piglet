<?php

use think\migration\Seeder;

class RoleSeeder extends Seeder
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
        $time = date('Y-m-d H:i:s');
        $data = [
            [
                'name' => '管理员',
                'create_time' => $time,
            ]
        ];

        $this->table('roles')->insert($data)->save();
    }
}