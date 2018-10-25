<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Manager;

class PicAuthController extends BaseAuthController
{
    protected $rules = [
        'alt' => 'required',
        'class_id' => 'required',
    ];

    protected $message = [
        'required' => '请输入:attribute',
    ];

    protected $customAttributes = [
        'alt' => '备注',
        'class_id' => '位置',
    ];
}
