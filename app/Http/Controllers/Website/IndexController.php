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
        return view('website.index.index', ['article_list'=>$goods_list]);
    }
}
