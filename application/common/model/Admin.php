<?php
namespace app\common\model;

use think\Model;

class Admin extends Model
{
    protected $table = 'admins';

    protected $observerClass = 'app\common\observer\Admin';

    public function role()
    {
        return $this->belongsTo('Role','role_id','id');
    }
}