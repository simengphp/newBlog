<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:16
 */

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Auth\Manager\PicAuthController;
use App\Model\Manager\ClassName;
use App\Model\Manager\Pic;
use Illuminate\Http\Request;

class PicController extends BaseController
{
    protected $model_obj = null;
    public function __construct()
    {
        $this->model_obj = new Pic();
    }

    public function picList(Request $request)
    {
        $list = $this->model_obj->picList(5, $request);
        return view('manager.pic.pic', ['top_name'=>'图片','version'=>'1.0',
            'list'=>$list,'request'=>$request]);
    }

    public function curdPic(Request $request)
    {
        if ($request->isMethod('post')) {
            $auth = (new PicAuthController())->goCheck($request);
            if ($auth) {
                return redirect()->back()->withErrors($auth)->withInput();
            }
            $data = $request->post();
            $file_img = $this->common($request, 'pic'); //上传图片
            if (isset($file_img['flag']) && $file_img['flag'] === false) {
                return redirect()->back()->withErrors($file_img['msg'])->withInput();
            }
            $pic = isset($data['pic'])?$data['pic']:'';
            $data['pic'] = $file_img?$file_img:$pic;
            $ret = $this->model_obj->curdModel($data);
            if ($ret) {
                return redirect('pic/picList')->with('success', isset($data['id'])&&$data['id']>0?'修改成功':'添加成功');
            } else {
                return redirect('pic/picList')->with('success', isset($data['id'])&&$data['id']>0?'修改失败':'添加失败');
            }
        } else {
            if ($request->get('id')) {
                $ret = $this->model_obj->getOneDetail($request->get('id'));
            } else {
                $ret = $this->model_obj;
            }
            $ret['class_list'] = [[
                'id'=>1,
                'class_name'=>'banner'
            ],['id'=>2,
                'class_name'=>'首页右方'
            ],['id'=>3,
                'class_name'=>'滚动图下方'
            ]];
            return view('manager.pic.curdPic', ['top_name'=>'图片表单','version'=>'1.0','class_obj'=>new ClassName(),'ret'=>$ret]);
        }
    }

    /**删除方法
     * @author crazy
     */
    public function delPic(Request $request)
    {
        $ret = $this->model_obj->delData($request->get('id'));
        if ($ret) {
            return redirect('pic/picList')->with('success', '删除成功');
        } else {
            return redirect('pic/picList')->with('error', '删除失败');
        }
    }
}
