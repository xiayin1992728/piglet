<?php

use think\migration\Seeder;

class AuthRole extends Seeder
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
        $data = [];
        for ($i=1;$i<=32;$i++) {
            $data[] = [
                'role_id' => 1,
                'auth_id' => $i
            ];
        }

        $this->table('auth_role')->insert($data)->save();
    }
}