<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/9
     * Time: 17:43
     */

namespace App\Http\Controllers\Blog;

use App\Model\Blog\Collect;
use Illuminate\Http\Request;

class CollectController extends BaseController
{

    protected $model = null;
    public function __construct()
    {
        $this->model = new Collect();
    }

    public function collectList(Request $request)
    {
        $data = $request->all();
        $list=$this->model->collectList(15, $data);
        foreach ($list as $k => $v) {
            $v->collect_count = $this->countCollect($v->article_id);
            $v->article_tille = $this->model->getArticleDetail($v->article_id);
        }
        return view('blog.collect.collectList', ['top_name'=>'收藏文章', 'version'=>'1.0',
            'list'=>$list,'request'=>$request]);
    }


    public function remove(Request $request)
    {
        $ret = $this->model->delData($request->get('id'));
        if ($ret) {
            return redirect('blog/collect/collects')->with('success', '取消成功');
        } else {
            return redirect('blog/collect/collects')->with('error', '取消失败');
        }
    }
}
