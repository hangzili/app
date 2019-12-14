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

// 商品表
Route::any("goods/add","Admin\GoodsController@add");

// 分类表
Route::any("cat/up","Admin\CatController@up");
Route::any("cat/add","Admin\CatController@add");
Route::any("cat/add_do","Admin\CatController@add_do");