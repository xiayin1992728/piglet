<?php

use think\migration\Seeder;

class ATagSeeder extends Seeder
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
            ['name' => '操作简单','create_time' => $time],
            ['name' => '门槛超低','create_time' => $time],
            ['name' => '不上征信','create_time' => $time],
            ['name' => '额度高','create_time' => $time],
            ['name' => '审核简单','create_time' => $time],
            ['name' => '通过率高','create_time' => $time],
            ['name' => '无视黑白','create_time' => $time],
            ['name' => '无地域限制','create_time' => $time],
        ];

        $this->table('tags')->insert($data)->save();
    }
}