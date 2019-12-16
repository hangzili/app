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

Route::any("coupons/add","Admin\CouponsController@add");//优惠券添加
Route::any("coupons/add_do","Admin\CouponsController@add_do");//优惠券添加
Route::any("coupons/list","Admin\CouponsController@list");//优惠券展示
Route::any("coupons/del","Admin\CouponsController@del");//优惠券删除
//用户优惠卷

Route::any("usercoupons/add","Admin\UsercouponsController@add");//用户优惠券添加
Route::any("usercoupons/add_do","Admin\UsercouponsController@add_do");//用户优惠券添加
Route::any("usercoupons/list","Admin\UsercouponsController@list");//用户优惠券添加
Route::any("usercoupons/del","Admin\UsercouponsController@del");//用户优惠券删除
