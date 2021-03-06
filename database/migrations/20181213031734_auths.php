<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Auths extends Migrator
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
        $table = $this->table('auths',array('engine'=>'InnoDB'));
        $table->addColumn('name', 'string',array('limit' => 40,'default'=>'','comment'=>'权限名称'))
            ->addColumn('auth_parent','integer',array('limit' => 10,'comment' => '权限父级'))
            ->addColumn('auth_icon','string',array('limit' => 50,'default'=>'','comment' => '权限字体图标'))
            ->addColumn('auth_url','string',array('limit' =>255,'null' => true,'comment' => '路由'))
            ->addColumn('create_time','datetime',array('comment' => '创建时间'))
            ->addColumn('update_time','timestamp',array('comment' => '修改时间'))
            ->addColumn('delete_time','integer',array('limit' => 10,'null' => true,'comment' => '软删除'))
            //->addIndex(array('username'), array('unique' => true))
            ->create();
    }
}
