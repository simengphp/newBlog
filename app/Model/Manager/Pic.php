<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/10
     * Time: 9:52
     */

namespace App\Model\Manager;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pic extends Base
{
    use SoftDeletes;
    const IS_NAV=1;
    const NO_NAV=0;

    protected $table = 'pic';
    protected $primaryKey = 'id';
    protected $model = null;
    public $timestamps = true;
    public $fillable = ['alt', 'pic', 'class_id', 'sort', 'url'];
    public function fromDateTime($value)
    {
        return empty($value)?$value:$this->getTimeFormat();
    }

    public function getTimeFormat()
    {
        return time();
    }

     /**模型查询默认是讲时间戳格式化的，如果想返回原样则需加下面函数*/
//    protected function asDateTime($val)
//    {
//        return $val;
//    }
    public function __construct(array $attributes = [])
    {
        $this->model = DB::table('friend_link');
        parent::__construct($attributes);
    }

    public function picList($num, Request $request)
    {
        $search = $request->all();
        if (isset($search['search'])) {
            $ret = Pic::where('alt', 'like', '%'.trim($search['search']).'%')
                ->orwhere('url', 'like', '%'.trim($search['search']).'%')
                ->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate($num);
            $ret->appends(array(
                'search' => $search['search'],
            ));
            return $ret;
        } else {
            $ret = Pic::orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate($num);
            return $ret;
        }
    }
    public function curdModel($data)
    {
        if (isset($data['id'])&&$data['id']>0) {
            $class = Pic::find($data['id']);
            $class->alt = $data['alt'];
            $class->pic = $data['pic'];
            $class->class_id = $data['class_id'];
            $class->url = $data['url'];
            $class->sort = $data['sort']??0;
            $class->status = 0;
            $ret = $class->save();
        } else {
            $ret = Pic::create($data);
        }

        return $ret;
    }

    public function getOneDetail($id)
    {
        return Pic::find($id);
    }

    public function delData($id)
    {
        $student = Pic::find($id);
        return $student->delete();
    }

    public function returnNav($ind = null)
    {
        $arr = [
            self::IS_NAV =>'是',
            self::NO_NAV =>'否',
        ];
        if ($ind != null) {
            return array_key_exists($ind, $arr)?$arr[$ind]:'未知';
        }
        return $arr;
    }

}
