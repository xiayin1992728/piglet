<?php

use think\migration\Seeder;

class ProductSeeder extends Seeder
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
        $product = [
            '/uploads/products/1.jpg',
            '/uploads/products/2.jpg',
            '/uploads/products/3.jpg',
            '/uploads/products/4.jpg',
            '/uploads/products/5.jpg',
            '/uploads/products/6.jpg',
            '/uploads/products/7.jpg',
        ];

        $tag = [
          '老哥缺钱找我们',
          '秒下款，高通过率，操作简单',
          '借钱不愁，现金3000秒到账',
          '纯信用借款，额度高',
          '有信用，最高20万'
        ];

        $data = [
            [
                'name' => '小猪来帮忙',
                'category_id' => '1',
                'money' => '20000',
                'loan_time' => '7',
                'interest_rate' => '0.05%',
                'loan_period' => '7-14',
                'product_icon' => $product[random_int(0,6)],
                'loan_record' => random_int(1000,9999),
                'product_tag' => $tag[random_int(0,4)],
                'pass_rate' => random_int(80,99).'%',
                'new_product' => random_int(0,1),
                'product_url' => 'http://www.vipxia.cn',
                'identity' => '身份证',
                'auxiliary' => '芝麻分、手机号',
                'require_age' => random_int(19,100),
                'sesame' => random(500,999),
                'create_time' => $time
            ],

            [
            'name' => '有钱花',
            'category_id' => '1',
            'money' => '20000',
            'loan_time' => '7',
            'interest_rate' => '0.05%',
            'loan_period' => '7-14',
            'product_icon' => $product[random_int(0,6)],
            'loan_record' => random_int(1000,9999),
            'product_tag' => $tag[random_int(0,4)],
            'pass_rate' => random_int(80,99).'%',
            'new_product' => random_int(0,1),
            'product_url' => 'http://www.vipxia.cn',
            'identity' => '身份证',
            'auxiliary' => '芝麻分、手机号',
            'require_age' => random_int(19,100),
            'sesame' => random(500,999),
            'create_time' => $time
        ],

            [
                'name' => '小红鱼',
                'category_id' => '1',
                'money' => '20000',
                'loan_time' => '7',
                'interest_rate' => '0.05%',
                'loan_period' => '7-14',
                'product_icon' => $product[random_int(0,6)],
                'loan_record' => random_int(1000,9999),
                'product_tag' => $tag[random_int(0,4)],
                'pass_rate' => random_int(80,99).'%',
                'new_product' => random_int(0,1),
                'product_url' => 'http://www.vipxia.cn',
                'identity' => '身份证',
                'auxiliary' => '芝麻分、手机号',
                'require_age' => random_int(19,100),
                'sesame' => random(500,999),
                'create_time' => $time
            ]
        ];

        $this->table('products')->insert($data)->save();
    }
}