<?php

use think\migration\Seeder;
use app\common\model\Product;
use app\common\model\Tag;

class ProductTagSeeder extends Seeder
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
        $product = Product::column('id');
        $tag = Tag::column('id');
        $data = [];

        foreach ($product as $key => $vo) {
           $data[] = [
               'product_id' => $vo,
               'tag_id' => $tag[random_int(0,count($tag)-1)],
           ];
        }

        $this->table('product_tags')->insert($data)->save();
    }
}