<?php
/**
 * Created by PhpStorm.
 * User: xia
 * Date: 2018/12/19
 * Time: 15:44
 */

namespace app\admin\controller;

use think\Controller;
use think\facade\Env;
use think\Request;

class Setting extends Controller
{
    public function carouselEdit()
    {
        $dir = Env::get('root_path').'public/setting/carousel.json';
        if (!file_exists($dir)) {
            mkdir(Env::get('root_path').'public/setting');
            $handle = fopen($dir,'w');
            fclose($handle);
        }
        $json = $this->getJson($dir);
        $this->assign('carousel',$json);
        return $this->fetch('setting/carousel/edit');
    }

    public function carouselUpdate(Request $request)
    {
        $data = $request->put();
        unset($data['file']);
        $dir = Env::get('root_path').'public/setting/carousel.json';
        $handle = fopen($dir,'w');
        fwrite($handle,json_encode($data));
        fclose($handle);

        return ['status' => 200, 'msg' => '保存成功'];
    }

    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move(Env::get('root_path') . 'public' . '/uploads/carousel');
        if ($info) {
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $url = '/uploads/carousel/' . $info->getSaveName();
            return ['status' => 200, 'data' => $url];
        } else {
            // 上传失败获取错误信息
            return ['status' => 402, 'msg' => $file->getError()];
        }
    }

    protected function getJson($json)
    {
        if (file_exists($json) && $handle = fopen($json,'r')){
            $content = json_decode(stream_get_contents($handle),true);
        }else {
            $content = [
                'one' => '',
                'oneLink' => '',
                'two' => '',
                'twoLink' => '',
                'three' => '',
                'threeLink' => ''
            ];
        }
        return $content;
    }
}