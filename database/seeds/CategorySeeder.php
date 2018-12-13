<?php

use think\migration\Seeder;

class CategorySeeder extends Seeder
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
            ['name' => '秒下款产品','create_time' => $time],
            ['name' => '爆款产品','create_time' => $time],
            ['name' => '凭身份证下款','create_time' => $time],
            ['name' => '不上征信','create_time' => $time],
            ['name' => '黑户可下','create_time' => $time]
        ];

        $this->table('categorys')->insert($data)->save();
    }
}