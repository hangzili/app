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
}
