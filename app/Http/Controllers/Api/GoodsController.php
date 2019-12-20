<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoodsModel;

class GoodsController extends Controller
{
    // 前台展示
    public function goods(Request $request)
    {
        $goodsInfo = GoodsModel::limit(15)->get();
        // dd($goodsInfo);
        return json_encode($goodsInfo);
    }

    // 前台展示2
    public function goods_2(Request $request)
    {
        $data = $request->all();
        // $data = "asc";

        if($data == 'desc'){
            $goodsInfo = GoodsModel::orderBy('g_num','asc')->limit(15)->get()->toArray();
        }else if($data == 'asc'){
            $goodsInfo = GoodsModel::orderBy('g_num','desc')->limit(15)->get()->toArray();
        }
        return json_encode($goodsInfo);
        // dd($goodsInfo);
    }

    // 前台展示3 
    public function goods_3(Request $request)
    {
        $data = $request->all();
        // $data = 'desc';
        if($data == 'desc'){
            $goodsInfo = GoodsModel::orderBy('g_num','asc')->limit(15)->get()->toArray();
        }else if($data == 'asc'){
            $goodsInfo = GoodsModel::orderBy('g_num','desc')->limit(15)->get()->toArray();
        }
        // dd($goodsInfo);
        return json_encode($goodsInfo);
    }
}
