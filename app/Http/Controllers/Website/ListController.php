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
        return view('website.list.list', ['article_list'=>$article_list]);
    }

    public function articleDetail(Request $request)
    {
        /**获取商品*/
        $goods_detail = $this->model->getOneDetail($request->g_id);
        $goods_detail['key'] = explode('|', $goods_detail['key']);
        /**获取分类名称*/
        $goods_detail['class_name'] = (new ClassName())->getOneDetail($goods_detail['class_id'])->class_name;
        $website_title = $goods_detail['title'];
        $website_key = $goods_detail['website_key'];
        $website_desc = $goods_detail['website_desc'];
        return view('website.detail.detail', ['article_detail'=>$goods_detail,'website_title'=>$website_title,
            'website_desc'=>$website_desc,'website_key'=>$website_key]);
    }
}