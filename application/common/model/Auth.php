<?php
namespace app\common\model;

use think\Model;

class Auth extends Model
{
    protected $table = 'auths';

    public function role()
    {
        return $this->belongsToMany('Role','auth_role','role_id','auth_id');
    }

}