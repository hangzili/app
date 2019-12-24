<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AddressModel;
class OrderController extends Controller
{
    //前台订单页面收货地址展示
    public function address()
    {
        $user_id=\Session::get('user');
        $address = AddressModel::where(['user_id'=>$user_id,'is_default'=>'0'])->get()->toArray();
        return json_encode($address);
    }
    //订单页面商品展示
    public function goods_list(Request $request)
    {
        $goods_id = $request->all();
        
    }
}
