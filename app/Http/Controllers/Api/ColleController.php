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
    public function ColleApi(Request $requets)
    {
        // $id = request()->all();
        $goodsInfo = GoodsModel::where(['goods_id'=>4])->get()->toArray();
        // dd($goodsInfo);  
        $id = $goodsInfo[0]['goods_id'];
        $time = time();
        $user = cookie::get('user');
        $colleInfo = ColleModel::create([
            'goods_id' => $id,
            'time' => $time,
            'u_id' => $user
        ]);
        
        return json_encode(['code'=>200,'colleInfo'=>$colleInfo]);
    }

    // 前台收藏展示
    public function listApi()
    {
        $colleInfo = ColleModel::join('goods','collection.goods_id','=','goods.goods_id')->get();
        // dd($colleInfo);
        return json_encode(['code'=>200,'colleInfo'=>$colleInfo]);
    }
}
