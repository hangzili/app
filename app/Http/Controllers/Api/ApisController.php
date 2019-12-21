<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Model\CarModel;
use App\Model\GoodsModel;
class ApisController extends Controller
{
//购物车展示
    public function carApi(){
           $u_id = cookie::get('user');
            //从数据库中取
                //根据用户id查询购物车表
                $car_where=["user_id"=>$u_id['u_id']];
                $car_where=["user_id"=>2];
                $car_res =CarModel::where($car_where)->join('goods','car.goods_id','=','goods.goods_id')->get()->toArray();
                return json_encode($car_res);

    }
}
