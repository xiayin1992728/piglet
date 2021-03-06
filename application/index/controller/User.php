<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\facade\Session;
use app\common\model\User as UserModel;
use app\common\validate\User as UserValidate;

class User extends Controller
{

    protected $middleware = [
        'user' => ['only' => ['index','delete']]
    ];

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $user = Session::get('user','user');
        $this->assign('user',$user);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $user = UserModel::get($id);
        $this->assign('user',$user);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request,UserValidate $validate,UserModel $user,$id)
    {
        $data = $request->put();
        $user = $user->get($id);
        if (!$validate->sceneUpdate($id)->check($data)) {
            Session::flash('error',$validate->getError());
            return redirect('/person/'.$user->id.'/edit');
        }

        if ($user->allowField(true)->save($data)) {
            Session::flash('success','修改成功');
            return redirect('/person/'.$user->id.'/edit');
        } else {
            Session::flash('error','修改失败');
            return redirect('/person/'.$user->id.'/edit');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    public function upload(Request $request)
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('uploads');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move(env('root_path').'public/'.'uploads/user');
        if($info){
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo json_encode(['status' => 200,'data' =>'/uploads/user/'.$info->getSaveName()]) ;
        }else{
            // 上传失败获取错误信息
            echo ['status' => 402,'msg' => $file->getError()];
        }
    }
}
