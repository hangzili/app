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