<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/23
     * Time: 17:24
     */

namespace App\Model\Tao;

class ClassName extends Base
{
    protected $table = 'class';

    public function classList()
    {
        $list = ClassName::all();
        return $list;
    }

    public function getOneDetail($id)
    {
        return ClassName::find($id);
    }

}