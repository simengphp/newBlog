<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/24
     * Time: 8:55
     */

namespace App\Providers;

use App\Model\Manager\Config;
use App\Model\Website\ClassName;
use App\Model\Website\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebsiteServiceProvider extends AppServiceProvider
{
    public function boot(Request $request)
    {
        /**获取分类*/
        $class_list = (new ClassName())->classList();
        /**获取友情链接*/
        $friend_link = (new Friend())->friendList();

        $config = (new Config())->getOneDetail(1);
        $website_title = $config['title'];
        $website_key = $config['keys'];
        $website_desc = $config['description'];


        View::share("website_title", $website_title);
        View::share("website_key", $website_key);
        View::share("website_desc", $website_desc);
        View::share("friend_link", $friend_link);
        View::share("class_list", $class_list);
        View::share("config", $config);
    }
}