<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:32
 */

namespace App\Http\Controllers\Auth\Manager;

class ArticleAuthController extends BaseAuthController
{
    protected $rules = [
        'title' => 'required',
        'desc' => 'required',
        'key' => 'required',
        'class_id' => 'required',
        'sort'      =>'required',
        'old_price'      =>'required',
        'new_price'      =>'required',
        'ticket'      =>'required'
    ];

    protected $message = [
        'required' => '请输入:attribute',
    ];

    protected $customAttributes = [
        'title' => '标题',
        'desc' => '商品描述',
        'key' => '关键词',
        'class_id' => '商品分类',
        'sort'      =>'排序',
        'old_price'      =>'原价格',
        'new_price'      =>'新价格',
        'ticket'      =>'优惠券'
    ];
}
