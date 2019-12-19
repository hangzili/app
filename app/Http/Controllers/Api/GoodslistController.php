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
        $goods = GoodsModel::where(['goods_id'=>10])->get()->toArray();
        return json_encode(['code'=>200,'goodslistInfo'=>$goodslistInfo]);
    }
    //根据商品id获取商品属性
    public function goods_sku(Request $request)
    {
        $id = $request->all();
        $goodsTypeInfo = BetModel::join('type','between.t_id','type.t_id')->where(['between.goods_id'=>$id])->get()->toArray();
        return json_encode(['code'=>200,'goodsTypeInfo'=>$goodsTypeInfo]);
    }

    // 根据属性id查询属性值
    public function type_attr(Request $request)
    {
        $id = $request->all();
        $goodsAttrInfo = BetModel::join('attr','between.a_id','attr.a_id')->where(['between.goods_id'=>$id])->get()->toArray();
        return json_encode(['code'=>200,'goodsAttrInfo'=>$goodsAttrInfo]);
    }
}
