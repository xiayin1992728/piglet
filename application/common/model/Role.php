<?php
namespace app\common\model;

use think\Model;
use app\common\model\Admin;

class Role extends Model
{
    protected $table = 'roles';
    protected $observerClass='app\common\observer\Role';

    public function admin()
    {
        return $this->hasMany('Admin','role_id','id');
    }

    public function auth()
    {
        return $this->belongsToMany('Auth','auth_role','auth_id','role_id');
    }

    public function getName()
    {
       return implode('  ',$this->auth->column('name'));
    }
}