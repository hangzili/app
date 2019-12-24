<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ColleModel;
use App\Model\GoodsModel;
use App\Model\UserModel;
use App\Model\BetModel;
use Illuminate\Support\Facades\Cookie;

class ColleController extends Controller
{
    // 前台收藏添加接口
    public function ColleApi(Request $request)
    {
        $id = request()->all();
        // $goodsInfo = GoodsModel::where(['goods_id'=>$id])->get()->toArray();

        // $goods_id = $request->all('goods_id');
        // $goods_id  = $goods_id['goods_id'];
        // $goodsInfo = GoodsModel::where(['goods_id'=>$goods_id])->get()->toArray();
        $id = $id['goods_id'];
        // dd($goodsInfo);  
        // $id = $goodsInfo[0]['goods_id'];
        $time = time();
        $user = \Session::get('user');
        $colleInfo = ColleModel::create([
            'goods_id' => $id,
            'time' => $time,
            'u_id' => $user
        ]);
        
        return json_encode("成功");
    }

    // 前台收藏展示
    public function listApi()
    {
        // $id = 1;
        $id = \Session::get('user');

        // dd($user);
        $colleInfo = ColleModel::join('goods','collection.goods_id','=','goods.goods_id')->where('collection.u_id','=',$id)->get()->toArray();
        // dd($colleInfo);
        return json_encode($colleInfo);
    }
}
