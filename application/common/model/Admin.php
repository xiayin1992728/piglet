<?php
namespace app\common\model;

use think\Model;
use think\Facade\Session;
use think\model\concern\SoftDelete;

class Admin extends Model
{
    use SoftDelete;
    protected $table = 'admins';

    protected $observerClass = 'app\common\observer\Admin';

    protected $hidden = [
      'password',
    ];

    public function role()
    {
        return $this->belongsTo('Role','role_id','id');
    }

    public function isOwner($id)
    {
        // 不能删除自己
        $sid = Session::get('admin','admin')->id;
        if ($sid == $id) {
            return true;
        } else {
            return false;
        }
    }

    public function isSuper()
    {
        // 超级管理员不能删除
        $sid = Session::get('admin','admin')->id;
        $super = $this->get($sid);
        if ($super->role_id == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function can($name)
    {
        $names = $this->role->auth->column('name');
        if (in_array($name,$names)) {
            return true;
        } else {
            return false;
        }
    }
}