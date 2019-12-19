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
        $goods_id = $request->all('goods_id');
        $goods_id = $goods_id['goods_id'];
        $list = GoodsModel::where('goods_id',$goods_id)->first()->toArray();
        return json_encode($list);
    }
    //根据商品id获取商品属性
    public function goods_sku(Request $request)
    {
        $goods_id = $request->all('goods_id');
        $goods_id = $goods_id['goods_id'];
        $type = BetModel::join('type','type.t_id','=','between.t_id')->where('between.goods_id','=',$goods_id)->get()->toArray();
        $attrarr = array();
        foreach($type as $k=>$v){
            // echo $v['a_id'];
            $attrarr[] = AttrModel::where('a_id','=',$v['a_id'])->get();
            $type['attr']=$attrarr;
        }
        
        return json_encode($type);
    }
}
