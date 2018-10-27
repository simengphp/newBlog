<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 13:53
 */

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Collect extends Base
{
    use SoftDeletes;
    protected $table = 'collect';
    protected $model = null;
    public $timestamps = true;
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
        $this->model = DB::table('collect');
        parent::__construct($attributes);
    }

    public function collectList($num, $data)
    {
        $list = Collect::where('deleted_at',null)->orderBy('created_at', 'desc')->paginate($num);
        return $list;
    }

    public function getArticleDetail($id)
    {
        $ret = DB::table('article')->where('id',$id)->first();
        return $ret->title;
    }

    public function getOneDetail($id)
    {
        return Collect::find($id);
    }

    public function delData($id)
    {
        $model = Collect::find($id);
        return $model->delete();
    }
}
