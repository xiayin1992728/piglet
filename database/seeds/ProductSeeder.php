static/index/images<?php

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
            '/static/index/images/1.jpg',
            '/static/index/images/2.jpg',
            '/static/index/images/3.jpg',
            '/static/index/images/4.jpg',
            '/static/index/images/5.jpg',
            '/static/index/images/6.jpg',
            '/static/index/images/7.jpg',
        ];

        $money_section = [
            '不限金额',
            '0~3千',
            '3千~5千',
            '5千~1万',
            '1万~3万',
            '3万~5万',
            '5万以上'
        ];

        $period_section = [
          '不限期限',
          '0~1个月',
          '1~3个月',
          '3~6个月',
          '6~12个月',
          '12~36个月',
          '36个月以上'
        ];

        $card = [
          '不限身份',
          '上班族',
          '学生党',
          '生意人',
          '自由职业'
        ];

        $introduction = [
          '老哥缺钱找我们',
          '秒下款，高通过率，操作简单',
          '借钱不愁，现金3000秒到账',
          '纯信用借款，额度高',
          '有信用，最高20万'
        ];

        $data = [];

        for ($i=0;$i<50;$i++) {
            $data[] = [
                'name' => '小猪来帮忙'.$i,
                'category_id' => random_int(1,13),
                'money' => '20000',
                'loan_time' => '7',
                'interest_rate' => '0.05%',
                'loan_period' => '7-14',
                'money_section' => $money_section[random_int(0,6)],
                'period_section' => $period_section[random_int(0,6)],
                'card' => $card[random_int(0,4)],
                'product_icon' => $product[random_int(0,6)],
                'loan_record' => random_int(1000,9999),
                'product_introduction' => $introduction[random_int(0,4)],
                'product_url' => 'http://www.vipxia.cn',
                'identity' => '身份证',
                'auxiliary' => '芝麻分、手机号',
                'require_age' => random_int(19,100),
                'sesame' => random_int(500,999),
                'create_time' => $time
            ];
        }

        $this->table('products')->insert($data)->save();
    }
}