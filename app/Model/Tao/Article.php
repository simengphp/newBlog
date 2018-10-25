<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:53
 */

namespace App\Model\Tao;

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

    public function goodsList($num, $data)
    {
        if (isset($data['search'])) {
            $this->model->where('title', 'like', '%'.trim($data['search']).'%');
        }
        if (isset($data['class_id'])) {
            $this->model->where('class_id', $data['class_id']);
        }
        $list = $this->model->where('deleted_at',null)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate($num);
        $list->appends([
            'search'        =>isset($data['search'])?$data['search']:'',
            'class_id'   =>isset($data['class_id'])?$data['class_id']:'',
        ]);
        return $list;
    }
    public function getOneDetail($id)
    {
        return Article::find($id);
    }

}
