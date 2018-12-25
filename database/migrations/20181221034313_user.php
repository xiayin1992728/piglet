<?php

use think\migration\Migrator;
use think\migration\db\Column;

class User extends Migrator
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
        $table = $this->table('users',array('engine'=>'InnoDB'));
        $table->addColumn('alias', 'string',array('limit' => 50,'default'=>'','comment'=>'昵称'))
            ->addColumn('name','string',['limit' => 20,'null' => true,'comment' => '真实姓名'])
            ->addColumn('card','string',['limit' => 20,'null' => true,'comment' => '身份证号'])
            ->addColumn('blank_card','string',['limit' => 40,'null' => true,'comment' => '银行卡号'])
            ->addColumn('avatar','string',array('limit' => 255,'null' => true,'comment' => '用户头像'))
            ->addColumn('phone','string',array('limit' => 25,'comment' => '手机号'))
            ->addColumn('password','string',array('limit' => 80, 'null' => true,'comment' => '用户密码'))
            ->addColumn('create_time','datetime',array('comment' => '创建时间'))
            ->addColumn('update_time','timestamp',array('comment' => '修改时间'))
            ->addColumn('delete_time','integer',array('limit' => 10,'null' => true,'comment' => '软删除'))
            ->create();
    }
}
