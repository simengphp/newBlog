<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:16
 */

namespace App\Http\Controllers\Website;

use App\Model\Website\Article;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index(Request $request)
    {
        /**获取文章*/
        $goods_list = (new Article())->articleList(16,$request->all());
        $m_id = session('blog_id');
        foreach ($goods_list as $k => $v) {
            $v->is_collect = $this->isCollect($m_id, $v->id)?1:0;
        }
        return view('website.index.index', ['article_list'=>$goods_list]);
    }
}
