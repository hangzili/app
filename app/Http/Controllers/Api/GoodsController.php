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
        $data = $request->all();
        $cat_id = $data['cat_id'];
        if($cat_id==""){
            $goodsInfo = GoodsModel::get()->limit('10')->toArray();


        }else{
            $goodsInfo = GoodsModel::get()->where('cat_id',$cat_id)->toArray();
        }
        

        return json_encode($goodsInfo);
    }

    // 前台展示2
    public function goods_2(Request $request)
    {
        $data = $request->all();
        // $data = "asc";
        $cat_id = $data['cat_id'];
        if($cat_id==""){
            if($data['order'] == 'desc'){
                $goodsInfo = GoodsModel::orderBy('g_num','asc')->limit('10')->get()->toArray();
            }else if($data['order'] == 'asc'){
                $goodsInfo = GoodsModel::orderBy('g_num','desc')->limit('10')->get()->toArray();
            }
        }else{
            if($data['order'] == 'desc'){
                $goodsInfo = GoodsModel::orderBy('g_num','asc')->where('cat_id',$cat_id)->get()->toArray();
            }else if($data['order'] == 'asc'){
                $goodsInfo = GoodsModel::orderBy('g_num','desc')->where('cat_id',$cat_id)->get()->toArray();
            }
        }
        
        // dd($goodsInfo);
        return json_encode($goodsInfo);
        // dd($goodsInfo);
    }

    // 前台展示3 
    public function goods_3(Request $request)
    {
        $data = $request->all();
        // $data = 'desc';
        $cat_id = $data['cat_id'];
        if($cat_id==""){
            if($data['order'] == 'desc'){
                $goodsInfo = GoodsModel::orderBy('g_price','asc')->limit('10')->get()->toArray();
            }else if($data['order'] == 'asc'){
                $goodsInfo = GoodsModel::orderBy('g_price','desc')->limit('10')->get()->toArray();
            }
        }else{
            if($data['order'] == 'desc'){
                $goodsInfo = GoodsModel::orderBy('g_price','asc')->where('cat_id',$cat_id)->get()->toArray();
            }else if($data['order'] == 'asc'){
                $goodsInfo = GoodsModel::orderBy('g_price','desc')->where('cat_id',$cat_id)->get()->toArray();
            }
        }
        
        // dd($goodsInfo);
        return json_encode($goodsInfo);
    }

    public function id_goods()
    {
        // $id = request()->all();
        $id = "1,2,3";
        $id = explode(",",$id);
        // var_dump ($id);exit();
        $goods = GoodsModel::whereIn('goods_id',$id)->get()->toArray();
        // dd($goods);
        // var_dump($goods_id);
        return json_encode($goods);
          
    }

}
