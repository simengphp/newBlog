<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/23
     * Time: 16:11
     */

namespace App\Http\Controllers\Tao;


use App\Model\Tao\Article;
use App\Model\Tao\ClassName;
use Illuminate\Http\Request;

class ListController extends BaseController
{
    protected $model = null;
    public function __construct()
    {
        $this->model = new Article();
    }

    public function goodsList(Request $request)
    {
        /**获取商品*/
        $goods_list = $this->model->goodsList(16,$request->all());
        return view('tao.list.list', ['goods_list'=>$goods_list]);
    }

    public function goodsDetail(Request $request)
    {
        /**获取商品*/
        $goods_detail = $this->model->getOneDetail($request->g_id);
        $goods_detail['key'] = explode('|', $goods_detail['key']);
        /**获取分类名称*/
        $goods_detail['class_name'] = (new ClassName())->getOneDetail($goods_detail['class_id'])->class_name;
        /**获取商品相关*/
        $data['class_id'] = $goods_detail['class_id'];
        $goods_list = $this->model->goodsList(16, $data);

        $website_title = $goods_detail['title'];
        $website_key = $goods_detail['website_key'];
        $website_desc = $goods_detail['website_desc'];
        return view('tao.detail.detail', ['goods_list'=>$goods_list,'goods_detail'=>$goods_detail,'website_title'=>$website_title,
            'website_desc'=>$website_desc,'website_key'=>$website_key]);
    }
}