<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:16
 */

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Auth\Manager\NavAuthController;
use App\Model\Manager\ClassName;
use App\Model\Manager\Nav;
use Illuminate\Http\Request;

class NavController extends BaseController
{
    protected $model_obj = null;
    public function __construct()
    {
        $this->model_obj = new Nav();
    }

    public function navList(Request $request)
    {
        $list = $this->model_obj->navList(5, $request);
        return view('manager.nav.nav', ['top_name'=>'导航栏','version'=>'1.0',
            'list'=>$list,'request'=>$request]);
    }

    public function curdNav(Request $request)
    {
        if ($request->isMethod('post')) {
            $auth = (new NavAuthController())->goCheck($request);
            if ($auth) {
                return redirect()->back()->withErrors($auth)->withInput();
            }
            $data = $request->post();
            $ret = $this->model_obj->curdModel($request);
            if ($ret) {
                return redirect('nav/navList')->with('success', isset($data['id'])&&$data['id']>0?'修改成功':'添加成功');
            } else {
                return redirect('nav/navList')->with('success', isset($data['id'])&&$data['id']>0?'修改失败':'添加失败');
            }
        } else {
            if ($request->get('id')) {
                $ret = $this->model_obj->getOneDetail($request->get('id'));
            } else {
                $ret = $this->model_obj;
            }
            return view('manager.nav.curdNav', ['top_name'=>'导航栏表单','version'=>'1.0','class_obj'=>new ClassName(),'ret'=>$ret]);
        }
    }

    /**删除方法
     * @author crazy
     */
    public function delNav(Request $request)
    {
        $ret = $this->model_obj->delData($request->get('id'));
        if ($ret) {
            return redirect('nav/navList')->with('success', '删除成功');
        } else {
            return redirect('nav/navList')->with('error', '删除失败');
        }
    }
}
