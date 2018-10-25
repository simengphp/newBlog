<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 10:15
 */
Route::group(['middleware'=>'manager'], function () {

    Route::any('/common/ajaxEditField', 'Manager\BaseController@ajaxEditField');
    Route::any('/common/delFieldBase', 'Manager\BaseController@delFieldBase');


    Route::any('/manager/login', 'Manager\ManagerController@login');
    Route::any('/main/index', 'Manager\IndexController@index');
    Route::any('/manager/loginOut', 'Manager\ManagerController@loginOut');

    Route::any('/article/articles', 'Manager\ArticleController@articleList');
    Route::any('/article/curdArticle', 'Manager\ArticleController@curdArticle');
    Route::any('/article/remove', 'Manager\ArticleController@remove');
    /**文章分类*/
    Route::any('/class/classList', 'Manager\ClassNameController@classList');
    Route::any('/class/curdClass', 'Manager\ClassNameController@curdClass');
    Route::any('/class/delClass', 'Manager\ClassNameController@delClass');
    /**配置管理*/
    Route::any('/config/config', 'Manager\ConfigController@config');
    /**贡献者管理*/
    Route::any('/stack/stack', 'Manager\StackController@stack');
    Route::any('/stack/curdStack', 'Manager\StackController@curdStack');
    Route::any('/stack/remove', 'Manager\StackController@remove');

    /**友情链接*/
    Route::any('/friend/friendList', 'Manager\FriendController@friendList');
    Route::any('/friend/curdFriend', 'Manager\FriendController@curdFriend');
    Route::any('/friend/delFriend', 'Manager\FriendController@delFriend');

    /**图片管理*/
    Route::any('/pic/picList', 'Manager\PicController@picList');
    Route::any('/pic/curdPic', 'Manager\PicController@curdPic');
    Route::any('/pic/delPic', 'Manager\PicController@delPic');

    /**导航栏管理*/
    Route::any('/nav/navList', 'Manager\NavController@navList');
    Route::any('/nav/curdNav', 'Manager\NavController@curdNav');
    Route::any('/nav/delNav', 'Manager\NavController@delNav');
});
