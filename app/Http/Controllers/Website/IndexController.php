<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:16
 */

namespace App\Http\Controllers\Website;

use App\Model\Website\Article;

class IndexController extends BaseController
{
    public function index()
    {
        /**获取文章*/
        $goods_list = (new Article())->articleList(16,[]);
        return view('website.index.index', ['article_list'=>$goods_list]);
    }
}
