<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/23
     * Time: 17:24
     */

namespace App\Model\Tao;

class Nav extends Base
{
    protected $table = 'nav';

    public function navList()
    {
        $list = Nav::orderBy('sort','asc')->get();
        return $list;
    }
}