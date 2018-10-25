<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'Website\IndexController@index');
Route::get('/website/list', 'Website\ListController@articleList');
Route::get('/website/detail', 'Website\ListController@articleDetail');
Route::get('/website/stack', 'Website\StackController@stackList');
