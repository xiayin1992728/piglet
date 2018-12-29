<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Products extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // create the table
        $table = $this->table('products',array('engine'=>'InnoDB'));
        $table->addColumn('name', 'string',array('limit' => 40,'comment'=>'产品名称'))
            ->addColumn('money', 'decimal',array('limit' => [10,2],'comment'=>'可借额度'))
            ->addColumn('money_section','string',array('limit' => 60,'comment' => '额度范围'))
            ->addColumn('loan_time', 'string',array('limit' => '40','default'=> '7','comment'=>'放款时间'))
            ->addColumn('interest_rate', 'char',array('limit' => 20,'comment'=>'利率'))
            ->addColumn('loan_period', 'string',array('limit' => 40,'comment'=>'贷款期限'))
            ->addColumn('period_section','string',array('limit' => 60,'comment' => '贷款时间区间'))
            ->addColumn('product_icon', 'string',array('limit' =>255 ,'comment'=>'产品图标'))
            ->addColumn('loan_record', 'char',array('limit' => 15,'comment'=>'下款人数统计'))
            ->addColumn('product_introduction','string',array('limit' => 40,'comment' => '产品标签'))
            ->addColumn('product_url','string',array('limit' => 255,'comment' => '产品url'))
            ->addColumn('identity','string',array('limit' => 50,'comment' => '身份证明'))
            ->addColumn('card','string',array('limit' => 60,'comment' => '身份'))
            ->addColumn('auxiliary','string',array('limit' => 50,'comment' => '辅助文件'))
            ->addColumn('require_age','char',array('limit' => 15,'default'=>'','comment' => '年龄要求'))
            ->addColumn('sesame','integer',array('limit' => 4,'default' => 0,'comment' => '芝麻信用'))
            ->addColumn('create_time','datetime',array('comment' => '创建时间'))
            ->addColumn('update_time','timestamp',array('comment' => '修改时间'))
            ->addColumn('delete_time','integer',array('limit' => 10,'null' => true,'comment' => '软删除'))
            ->create();
    }
}
