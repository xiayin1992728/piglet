<?php
namespace app\common\model;

use think\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function admin()
    {
        return $this->hasMany('Admin','role_id','id');
    }

    public function auth()
    {
        return $this->belongsToMany('Auth','auth_role','auth_id','id');
    }
}