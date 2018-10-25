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
        'content'      =>'required',

    ];

    protected $message = [
        'required' => '请输入:attribute',
    ];

    protected $customAttributes = [
        'title' => '标题',
        'desc' => '文章描述',
        'key' => '关键词',
        'class_id' => '文章分类',
        'content'      =>'内容',
    ];
}
