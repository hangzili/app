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
Route::group(['middleware'=>'rbac'],function(){



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
Route::any("goods/ajax","Admin\GoodsController@ajax");
Route::any("goods/up","Admin\GoodsController@up");
Route::any("goods/add_do","Admin\GoodsController@add_do");
Route::any("goods/list","Admin\GoodsController@list");
Route::any("goods/del","Admin\GoodsController@del");
// 分类表
Route::any("cat/up","Admin\CatController@up");
Route::any("cat/add","Admin\CatController@add");
Route::any("cat/add_do","Admin\CatController@add_do");
Route::any("cat/list","Admin\CatController@list");
Route::any("cat/del","Admin\CatController@del");

// 品牌表
Route::any("brand/add","Admin\BrandController@add");
Route::any("brand/add_do","Admin\BrandController@add_do");
Route::any("brand/list","Admin\BrandController@list");
Route::any("brand/del","Admin\BrandController@del");



// RBAC
Route::prefix('rbac')->group(function () {
    
    

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

// 关系表
Route::prefix('bet')->group(function () {
    Route::any("betadd","Bet\BetController@betadd");//视图
    Route::any("dobetadd","Bet\BetController@dobetadd");//添加执行
    Route::any("betlist","Bet\BetController@betlist");//展示
    Route::any("del","Bet\BetController@del");//删除
});

// 类型
 Route::prefix('type')->group(function () {
    Route::any("type","Type\TypeController@type");//类型视图
    Route::any("dotype","Type\TypeController@dotype");//类型添加执行
    Route::any("typelist","Type\TypeController@typelist");//类型展示
    Route::any("del","Type\TypeController@del");//类型删除
});

// 属性
Route::prefix('attr')->group(function () {
    Route::any("attr","Attr\AttrController@attr");//属性视图
    Route::any("doattr","Attr\AttrController@doattr");//属性执行添加
    Route::any("attrlist","Attr\AttrController@attrlist");//属性展示
    Route::any("del","Attr\AttrController@del");//属性删除
});

// 轮播图
Route::prefix('img')->group(function () {
    Route::any("img","Img\ImgController@img");//轮播图视图
    Route::any("doimg","Img\ImgController@doimg");//轮播图添加执行
    Route::any("up","Img\ImgController@up");//轮播图添加执行
    Route::any("imglist","Img\ImgController@imglist");//轮播图展示
    Route::any("del","Img\ImgController@del");//删除轮播图
});



});


                                                            // 接口
    
Route::any("rbac/regis","Rbac\LoginController@regis");//用户注册视图
    Route::any("rbac/doregis","Rbac\LoginController@doregis");//用户注册执行
    Route::any("rbac/login","Rbac\LoginController@login");//用户登录视图
    Route::any("rbac/dologin","Rbac\LoginController@dologin");//用户登录执行
    Route::any("/exit","IndexController@exit");//退出登录执行




// 加入购物车
Route::any("car/is_login","Admin\CarController@is_login");
Route::any("car/add","Admin\CarController@add");





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




    // 接口
Route::prefix('api')->group(function () {
    Route::any("imgApi","Api\ApiController@imgApi");//轮播图接口
    Route::any("registApi","Api\ApiController@registApi");//前台注册接口
    Route::any("loginApi","Api\ApiController@loginApi");//前台登录接口
    Route::any("addbakeApi","Api\ApiController@addbakeApi");//前台银行卡添加接口
    Route::any("listbakeApi","Api\ApiController@listbakeApi");//前台银行卡展示接口
    Route::any("highApi","Api\ApiController@highApi");//前台精品推荐接口
    Route::any("drinksAPi","Api\ApiController@drinksAPi");//前台酒水推荐接口
    Route::any("likeApi","Api\ApiController@likeApi");//前台猜你喜欢接口
    Route::any("catApi","Api\ApiController@catApi");//前台分类接口
    Route::any("brandApi","Api\ApiController@brandApi");//前台品牌接口
    Route::any("brGroApi","Api\ApiController@brGroApi");//前台品牌商品接口
    Route::any("gdetailsApi","Api\ApiController@gdetailsApi");//前台商品详情接口
    Route::any("ColleApi","Api\ColleController@ColleApi");//前台收藏添加接口
    Route::any("listApi","Api\ColleController@listApi");//前台收藏展示接口
    Route::any("goodsDelApi","Api\ApiController@goodsDelApi");//前台购物车删除接口
    Route::any("gumcum","Api\ApiController@gumcum");//前台商品数量和购物车数量接口
    Route::any("carupnumApi","Api\ApiController@carupnumApi");//前台修改购物车数量接口
    Route::any("session","Api\ApiController@session");//前台修改购物车数量接口
});
//前台商品详情页的接口
Route::any("api/goods_list","Api\GoodslistController@goods_list");//前台商品详情接口
Route::any("api/goods_sku","Api\GoodslistController@goods_sku");//前台商品详情sku接口
Route::any("api/type_attr","Api\GoodslistController@type_attr");//前台商品详情sku接口2

Route::any("api/goods","Api\GoodsController@goods");//前台商品展示接口
Route::any("api/goods_2","Api\GoodsController@goods_2");//前台商品展示接口2
Route::any("api/goods_3","Api\GoodsController@goods_3");//前台商品展示接口3

Route::any("api/carApi","Api\ApisController@carApi");//购物车展示
Route::any("api/cardel","Api\ApisController@cardel");//购物车删除
Route::any("api/coldel","Api\ApisController@coldel");//收藏删除


Route::any("api/addrelistApi","Api\AddressController@addrelistApi");//前台收货地址展示接口

