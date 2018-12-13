<?php

use think\migration\Seeder;

class AdminsSeeder extends Seeder
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
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name'      => $faker->userName,
                'password'      => md5(md5('password')),
                'phone' => $faker->phoneNumber,
                'email'         => $faker->email,
                'role_id' => 1,
                'create_time'   => date('Y-m-d H:i:s',time()),
            ];
        }
        $data[0]['phone'] = '15108479103';
        $this->table('admins')->insert($data)->save();
    }
}