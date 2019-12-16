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
// 商品表
Route::any("goods/add","Admin\GoodsController@add");

// 分类表
Route::any("cat/up","Admin\CatController@up");
Route::any("cat/add","Admin\CatController@add");
Route::any("cat/add_do","Admin\CatController@add_do");


Route::any("goods/add","Admin\GoodsController@add");



Route::any("goods/add","Admin\GoodsController@add");
// RBAC
Route::prefix('rbac')->group(function () {
    Route::any("regis","Rbac\LoginController@regis");//用户注册视图
    Route::any("doregis","Rbac\LoginController@doregis");//用户注册执行
    Route::any("login","Rbac\LoginController@login");//用户登录视图
    Route::any("dologin","Rbac\LoginController@dologin");//用户登录执行

    // 角色
    Route::any("role","Rbac\RoleController@role");//用户角色视图
    Route::any("dorole","Rbac\RoleController@dorole");//用户角色执行
    Route::any("rolelist","Rbac\RoleController@rolelist");//用户角色展示

    // 用户角色关系
    Route::any("user_role","Rbac\UserRoleController@user_role");//用户角色关系视图
    Route::any("do_user_role","Rbac\UserRoleController@do_user_role");//用户角色关系执行
    Route::any("user_role_list","Rbac\UserRoleController@user_role_list");//用户角色关系展示

    // 权限
    Route::any("permi","Rbac\PermiController@permi");//用户权限视图
    Route::any("dopermi","Rbac\PermiController@dopermi");//用户权限执行
    Route::any("permilist","Rbac\PermiController@permilist");//用户权限展示

    // 角色权限关系
    Route::any("role_permi","Rbac\RolePermiController@role_permi");//角色权限视图
    Route::any("do_role_permi","Rbac\RolePermiController@do_role_permi");//角色权限执行
    Route::any("role_permi_list","Rbac\RolePermiController@role_permi_list");//角色权限展示

});

// 类型
Route::prefix('type')->group(function () {
    Route::any("type","Type\TypeController@type");//类型视图
    Route::any("dotype","Type\TypeController@dotype");//类型添加执行
    Route::any("typelist","Type\TypeController@typelist");//类型展示
});

// 属性
Route::prefix('attr')->group(function () {
    Route::any("attr","Attr\AttrController@attr");//类型视图
    Route::any("doattr","Attr\AttrController@doattr");//类型视图
    Route::any("attrlist","Attr\AttrController@attrlist");//类型视图
});

// 轮播图
Route::prefix('img')->group(function () {
    Route::any("img","Img\ImgController@img");//轮播图视图
    Route::any("doimg","Img\ImgController@doimg");//轮播图添加执行
    Route::any("up","Img\ImgController@up");//轮播图添加执行
    Route::any("imglist","Img\ImgController@imglist");//轮播图展示
    Route::any("del","Img\ImgController@del");//删除轮播图
});

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


Route::prefix('api')->group(function () {
    Route::any("imgApi","Api\ApiController@imgApi");//轮播图接口
});
