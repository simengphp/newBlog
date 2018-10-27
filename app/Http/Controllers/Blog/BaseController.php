<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:13
 */

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Demo\UploadController;
use App\Model\Blog\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function ajaxEditField(Request $request)
    {
        $data = $request->post();
        $field = $data['field'];
        $value = $data['value'];
        $id = $data['id'];
        $table = $data['table'];
        try {
            $ret = (new Base())->editFieldBase($table, $id, $field, $value);
        } catch (\Exception $exception) {
            $ret = ['code'=>0];
        }
        if ($ret) {
            return ['code'=>1];
        } else {
            return ['code'=>0];
        }
    }

    /**上传图片的公共方法
     * @author crazy
     */
    public function common(Request $request, $file_name)
    {
        $file = $request->file($file_name);
        if (!isset($file)) {
            return;
        }
        if ($file->isValid()) {
            $ret = UploadController::isImg($file);
            if ($ret) {
                $is_upload = UploadController::uploadOne($file);
                if ($is_upload === false) {
                    $arr = [
                        'msg'=>'上传失败',
                        'flag' =>false
                    ];
                    return $arr;
                } else {
                    return $is_upload;
                }
            } else {
                $arr = [
                    'msg'=>'图片后缀错误',
                    'flag' =>false
                ];
                return $arr;
            }
        }
    }

    /**全选删除值*/
    public function delFieldBase(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $table = $data['table'];
        try {
            $ret = (new Base())->delFieldBase($table, $id);
        } catch (\Exception $exception) {
            $ret = 0;
        }
        if ($ret) {
            return 1;
        } else {
            return 0;
        }
    }

    public function countCollect($id)
    {
        return DB::table()->where('article_id', $id)->where('deleted_at',null)->count();
    }
}
