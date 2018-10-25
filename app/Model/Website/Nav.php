<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/23
     * Time: 17:24
     */

namespace App\Model\Website;

class Nav extends Base
{
    protected $table = 'nav';

    public function navList()
    {
        $list = Nav::where('deleted_at',null)->orderBy('sort','asc')->get();
        return $list;
    }
}