<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/23
     * Time: 17:24
     */

namespace App\Model\Website;

class ClassName extends Base
{
    protected $table = 'class';

    public function classList()
    {
        $list = ClassName::where('deleted_at',null)->get();
        return $list;
    }

    public function getOneDetail($id)
    {
        return ClassName::find($id);
    }

}