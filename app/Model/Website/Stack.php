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

class Stack extends Base
{
    use SoftDeletes;
    protected $table = 'stack';
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
        $this->model = DB::table('stack');
        parent::__construct($attributes);
    }

    public function stackList($num, $data)
    {
        $list = $this->model->where('deleted_at',null)->paginate($num);
        $list->appends([
            'title'        =>isset($data['title'])?$data['title']:'',
        ]);
        return $list;
    }
    public function getOneDetail($id)
    {
        return Article::find($id);
    }

}
