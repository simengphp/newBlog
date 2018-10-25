<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:16
 */

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Auth\Manager\ConfigAuthController;
use App\Model\Manager\Config;
use Illuminate\Http\Request;

class ConfigController extends BaseController
{
    protected $model_obj = null;
    public function __construct()
    {
        $this->model_obj = new Config();
    }

    public function config(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->post();
            $file_img = $this->common($request, 'pic'); //上传图片
            if (isset($file_img['flag']) && $file_img['flag'] === false) {
                return redirect()->back()->withErrors($file_img['msg'])->withInput();
            }
            $pic = isset($data['pic'])?$data['pic']:'';
            $data['pic'] = $file_img?$file_img:$pic;
            $ret = $this->model_obj->curdModel($data);
            if ($ret) {
                return redirect('config/config')->with('success', isset($data['id'])&&$data['id']>0?'修改成功':'添加成功');
            } else {
                return redirect('config/config')->with('success', isset($data['id'])&&$data['id']>0?'修改失败':'添加失败');
            }
        } else {
            $ret = $this->model_obj->getOneDetail(1);
            return view('manager.config.config', ['top_name'=>'配置管理','version'=>'1.0','ret'=>$ret]);
        }
    }
}
