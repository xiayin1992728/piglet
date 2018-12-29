<?php

use think\migration\Seeder;
use app\common\model\Category;
use app\common\model\Product;

class TProductCategorySeeder extends Seeder
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
        $productCount = Product::count('id');
        $categoryCount = Category::count('id');
        $data = [];

        for ($i=1;$i<=$productCount;$i++) {
            $data[] =[
              'category_id' => random_int(1,$categoryCount),
               'product_id' => $i,
            ];
        }

        $this->table('product_category')->insert($data)->save();
    }
}