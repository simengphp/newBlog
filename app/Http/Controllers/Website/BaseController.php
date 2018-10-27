<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:13
 */

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function isCollect($m_id, $article_id)
    {
        $is_collect = DB::table('collect')->where('m_id', $m_id)->where('article_id', $article_id)->first();
        if (!empty($is_collect)) {
            return true;
        }
        return false;
    }
}
