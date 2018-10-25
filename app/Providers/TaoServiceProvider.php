<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/24
     * Time: 8:55
     */

namespace App\Providers;

use App\Model\Manager\Config;
use App\Model\Tao\ClassName;
use App\Model\Tao\Friend;
use App\Model\Tao\Nav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TaoServiceProvider extends AppServiceProvider
{
    public function boot(Request $request)
    {
        /**获取分类*/
        $class_list = (new ClassName())->classList();
        /**获取导航栏*/
        $nav_list = (new Nav())->navList();
        /**获取友情链接*/
        $friend_link = (new Friend())->friendList();


        $config = (new Config())->getOneDetail(1);
        $website_title = $config['title']??"淘券网,一个帮你省钱的购物网站";
        $website_key = $config['keys']??"返利,优惠券,淘宝优惠券,消费返利网,京东优惠券";
        $website_desc = $config['description']??"淘券网,一个帮你省钱的购物网站,提供天猫，淘宝等购物网站的优惠券，让你花更少的钱买更多的东西";


        View::share("website_title", $website_title);
        View::share("website_key", $website_key);
        View::share("website_desc", $website_desc);
        View::share("friend_link", $friend_link);
        View::share("class_list", $class_list);
        View::share("nav_list", $nav_list);
    }
}