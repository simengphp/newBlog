<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/23
     * Time: 17:24
     */

namespace App\Model\Tao;

use Illuminate\Support\Facades\DB;

class Pic extends Base
{
    protected $table = 'pic';

    public function picList($class_id)
    {
        $list = DB::table('pic')->orderBy('sort','asc')->where('deleted_at', null)->where('class_id', $class_id)->get();
        return $list;
    }

    public function onePic($class_id)
    {
        $ret = DB::table('pic')->orderBy('sort','asc')->where('deleted_at', null)->where('class_id', $class_id)->first();
        return $ret;
    }
}