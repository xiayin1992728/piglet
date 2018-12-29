<?php

use think\migration\Migrator;
use think\migration\db\Column;

class ProudctCategory extends Migrator
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
        $table = $this->table('product_category',array('engine'=>'InnoDB'));
        $table->addColumn('product_id', 'integer',array('limit' => 10,'comment'=>'产品外键'))
            ->addColumn('category_id','integer',array('limit' => 10,'comment' => '分类外键'))
            //->addIndex(array('username'), array('unique' => true))
            ->create();
    }
}
