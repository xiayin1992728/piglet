<?php

use think\migration\Seeder;

class UserSeeder extends Seeder
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
                'name' => '夏银',
                'phone' => '15108479103',
                'avatar' => '/static/index/images/person/default.png',
                'password' => md5(md5('password')),
                'create_time' => $time,
            ]
        ];

        $this->table('users')->insert($data)->save();
    }

    public function generatePassword()
    {
        $str = '1234567890qwertyuiopasdfghjklzxcvbnm!@#$%^&*()';
        $password = '';
        for ($i=0;$i<8;$i++) {
            $password .= $str[$i];
        }

        return $password;
    }
}