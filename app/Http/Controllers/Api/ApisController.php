<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Model\CarModel;
use App\Model\GoodsModel;
use App\Model\ColleModel;
class ApisController extends Controller
{
//购物车展示
    public function carApi()
    {
        // $u_id = cookie::get('user');
        // //从数据库中取
        // //根据用户id查询购物车表
        // $car_where = ["user_id" => $u_id['u_id']];
        $user_id=\Session::get('user');
        $car_where = ["user_id" => $user_id];
        $car_res = CarModel::where($car_where)->join('goods', 'car.goods_id', '=', 'goods.goods_id')->get()->toArray();
        return json_encode($car_res);

    }
//购物车删除
    public function cardel(Request $request)
    {
        $goods_id = request()->all();
        $user_id=\Session::get('user');
        $wheres = ['goods_id'=>$goods_id];
        $where = ['user_id' => $user_id];
        $res =CarModel::where($where)->where($wheres)->delete();
        return json_encode($res);
    }
    //收藏删除
    public function coldel(Request $request)
    {
        $goods_id = request()->all();
        $u_id=\Session::get('user');
        $wheres = ['goods_id'=>$goods_id];
        $where = ['u_id' => $u_id];
        $res =ColleModel::where($where)->where($wheres)->delete();
        return json_encode($res);
    }

}
