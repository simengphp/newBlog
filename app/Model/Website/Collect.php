<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-10-27
 * Time: 21:54
 */

namespace App\Model\Website;


use Illuminate\Support\Facades\DB;

class Collect extends Base
{
    public function curdCollect($data)
    {
        $ret = DB::table('collect')->insert($data);
        if ($ret) {
            return 1;
        }
        return 0;
    }

    public function delCollect($m_id,$article_id)
    {
        $data['deleted_at'] = time();
        $ret = DB::table('collect')->where('m_id',$m_id)->where('article_id',$article_id)->update($data);
        if ($ret) {
            return 1;
        }
        return 0;
    }

    public function findCollect($m_id,$article_id)
    {
        $ret = DB::table('collect')->where('m_id',$m_id)->where('article_id',$article_id)->where('deleted_at',null)->first();
        return $ret;
    }
}