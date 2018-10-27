<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:13
 */

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Model\Website\Collect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function isCollect($m_id, $article_id)
    {
        $is_collect = DB::table('collect')->where('m_id', $m_id)->where('deleted_at',null)->where('article_id', $article_id)->first();
        if (!empty($is_collect)) {
            return true;
        }
        return false;
    }


    public function curdCollect(Request $request)
    {
        if (session('blog_id')) {
            $data = $request->all();
            $model = new Collect();
            $is_set = $model->findCollect(session('blog_id'),$data['article_id']);
            if (!empty($is_set)) {
                $ret = $model->delCollect(session('blog_id'),$data['article_id']);
                return $ret;
            }
            $save_data['m_id'] = session('blog_id');
            $save_data['article_id'] = $data['article_id'];
            $save_data['created_at'] = time();
            $save_data['updated_at'] = time();
            $ret = $model->curdCollect($save_data);
            return $ret;
        } else {
            return -1;
        }
    }

}
