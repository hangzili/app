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

Route::get('/', function () {
    return view('welcome');
});
Route::any('/','IndexController@index');

Route::any("goods/add","Admin\GoodsController@add");

//前台收货地址添加
Route::any("address/add","Admin\AddressController@add");
Route::any("address/add_do","Admin\AddressController@add_do");
Route::any("address/list","Admin\AddressController@list");
//前台浏览记录
Route::any("page/add","Admin\PageController@add");
Route::any("page/list","Admin\PageController@list");
//前台搜索记录
Route::any("search/add","Admin\SearchController@add");
Route::any("search/list","Admin\SearchController@list");
//我的收藏
Route::any("collection/add","Admin\CollectionController@add");
Route::any("collection/list","Admin\CollectionController@list");
//前台用户添加
Route::any("user/add","Admin\UserController@add");
Route::any("user/list","Admin\UserController@list");