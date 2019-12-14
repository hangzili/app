<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\UserModel;
use Illuminate\Support\Facades\Cookie;
class UserController extends Controller
{
    //前台用户添加
    public function add(Request $request)
    {
        $all = $request->all();
        $user_name = $all['user_name'];
        $user_pwd = $all['user_pwd'];
        $user_email =  $all['user_email'];
        $find_name = UserModel::get()->where('user_name',$user_name)->toArray();
        if($find_name){
            //此用户名已经有，从新选
            exit;
        }
        $find_email = UserModel::all()->where('user_email',$user_email)->toArray();
        if($find_email){
            //此邮箱已经被注册，从新选
            exit;
        }
        //注册成功后跳入展示页面 存cookie
        $data = array('user_name'=>$user_name,'user_pwd'=>$user_pwd,'user_email'=>$user_email,'user_time'=>time());
        // dump($data);
        $user_id = UserModel::insertGetId($data);
        Cookie::make("user",$user_id);
        //成功，跳页面

    }
}
