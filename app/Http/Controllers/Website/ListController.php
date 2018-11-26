<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/23
     * Time: 16:11
     */

namespace App\Http\Controllers\Website;


use App\Model\Website\Article;
use App\Model\Website\ClassName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ListController extends BaseController
{
    protected $model = null;
    public function __construct()
    {
        $this->model = new Article();
    }

    public function articleList(Request $request)
    {
        /**获取商品*/
        $article_list = $this->model->articleList(16,$request->all());
        $m_id = session('blog_id');
        foreach ($article_list as $k => $v) {
            $v->is_collect = $this->isCollect($m_id, $v->id)?1:0;
        }
        return view('website.list.list', ['article_list'=>$article_list]);
    }

    public function articleDetail(Request $request)
    {
        if (Cache::get('key1')) {
            echo 1111;
        }
        Cache::add('key1', 1, 10);
        $value = Cache::get('key1');
        var_dump($value);
        /**获取文章详情*/
        $this->model->editOneDetail($request->id);
        $goods_detail = $this->model->getOneDetail($request->id);
        $website_title = $goods_detail['title'];
        $website_key = $goods_detail['website_key'];
        $website_desc = $goods_detail['website_desc'];
        Cache::add('key1', 0, 10);
        return view('website.detail.detail', ['article_detail'=>$goods_detail,'website_title'=>$website_title,
            'website_desc'=>$website_desc,'website_key'=>$website_key]);
    }
}