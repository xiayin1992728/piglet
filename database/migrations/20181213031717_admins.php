<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Admins extends Migrator
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
        $table = $this->table('admins',array('engine'=>'MyISAM'));
        $table->addColumn('name', 'string',array('limit' => 40,'default'=>'','comment'=>'用户名称'))
            ->addColumn('role_id','integer',array('limit' => 10,'comment' => '角色外键'))
            ->addColumn('password','string',array('limit' => 64,'comment' => '密码'))
            ->addColumn('phone','char',array('limit' => 40,'comment' => '手机号码'))
            ->addColumn('email','string',array('limit' => 40,'comment' => 'email','default' => ''))
            ->addColumn('header','string',array('limit' => 255,'default' => '','comment' => '头像'))
            ->addColumn('create_time','datetime',array('comment' => '创建时间'))
            ->addColumn('update_time','timestamp',array('comment' => '修改时间'))
            ->addColumn('delete_time','integer',array('limit' => 10,'null' => true,'comment' => '软删除'))
            //->addIndex(array('username'), array('unique' => true))
            ->create();
    }
}
