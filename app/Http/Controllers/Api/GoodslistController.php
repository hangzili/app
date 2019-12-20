<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use App\Model\BetModel;
use App\Model\AttrModel;
use App\Model\TypeModel;


class GoodslistController extends Controller
{
    //商品详情页展示商品
    public function goods_list(Request $request)
    {
        $id = $request->all();
        $goodslistInfo = GoodsModel::where(['goods_id'=>$id])->get();
        return json_encode($goodslistInfo);
    }
    //根据商品id获取商品属性
    public function goods_sku(Request $request)
    {
        // $goods = GoodsModel::where(['goods_id'=>21])->get()->toArray();
        // $id = $goods[0]['goods_id'];
        $id = $request->all();
        $goodsTypeInfo = BetModel::join('type','between.t_id','type.t_id')->where(['between.goods_id'=>$id])->select('type.t_name','type.t_id')->distinct('type.t_name')->get()->toArray();
        $arr=[];
        foreach($goodsTypeInfo as $k=>$v){
            $goodsAttrInfo = BetModel::join('attr','between.a_id','attr.a_id')->where(['between.goods_id'=>$id,'between.t_id'=>$v['t_id']])->get()->toArray();
            // $goodsTypeInfo[$k] =$goodsAttrInfo;
            array_push($goodsTypeInfo[$k],$goodsAttrInfo);
        }
        
        // dump($goodsTypeInfo);
        return json_encode($goodsTypeInfo);
    }

    // 根据属性id查询属性值
    public function type_attr(Request $request)
    {
        $goods = GoodsModel::where(['goods_id'=>18])->get()->toArray();
        $id = $goods[0]['goods_id'];
        // $id = $request->all();
        $goodsAttrInfo = BetModel::join('attr','between.a_id','attr.a_id')->where(['between.goods_id'=>$id])->get()->toArray();
        //dd($goodsAttrInfo);
        return json_encode($goodsAttrInfo);
    }
}
