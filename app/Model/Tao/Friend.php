<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/23
     * Time: 17:24
     */

namespace App\Model\Tao;

class Friend extends Base
{
    protected $table = 'friend_link';

    public function friendList()
    {
        $list = Friend::orderBy('sort','asc')->where('deleted_at',null)->get();
        return $list;
    }
}