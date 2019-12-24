<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AddressModel;
use App\Model\UserModel;
use Illuminate\Support\Facades\Cookie;

class AddressController extends Controller
{
    // 前台收货地址展示接口
    public function addrelistApi()
    {
        // $user = UserModel::where(['u_id'=>6])->get();
        // // dd($user);
        // $u_id = $user[0]['u_id'];
        // // dd($u_id);
        // Cookie::queue('users',$u_id);

        $uid = Cookie::get('users');
        // dd($uid);
        $addreInfo = AddressModel::where('user_id','=',$uid)->get()->toArray();
        // dd($addreInfo);
        return json_encode($addreInfo);

    }

    // 根据session查用户地址信息（yxl）
    public function user_ress()
    {
        // $user_id = \session::get('user');
        $model = new AddressModel;
        // 如果session等于2  1是默认地址
        $user_ress = $model->where(['user_id'=>2,'is_default'=>1])->first();
        // dd($user_ress);
        return json_encode($user_ress);
    }
}
