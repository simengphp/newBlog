<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:53
 */

namespace App\Model\Website;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Base
{
    use SoftDeletes;
    protected $table = 'article';
    protected $model = null;
    public function fromDateTime($value)
    {
        return empty($value)?$value:$this->getTimeFormat();
    }

    public function getTimeFormat()
    {
        return time();
    }

    public function __construct(array $attributes = [])
    {
        $this->model = DB::table('article');
        parent::__construct($attributes);
    }

    public function articleList($num, $data)
    {
        //dd($data);
        if (isset($data['title'])) {
            $this->model->where('title', 'like', '%'.trim($data['title']).'%');
        }
        if (isset($data['m_id'])) {
            $this->model->where('m_id', $data['m_id']);
        }
        if (isset($data['class_id'])) {
            $this->model->where('class_id', $data['class_id']);
        }
        if (isset($data['update'])) {
            $this->model->orderBy('created_at', 'desc');
        } elseif(isset($data['read_num'])) {
            $this->model->orderBy('look', 'desc');
        }else {
            $this->model->orderBy('sort', 'asc');
        }
        $list = $this->model->where('deleted_at',null)->paginate($num);
        $list->appends([
            'title'        =>isset($data['title'])?$data['title']:'',
            'class_id'   =>isset($data['class_id'])?$data['class_id']:'',
        ]);
        return $list;
    }
    public function getOneDetail($id)
    {
        return Article::find($id);
    }

}
