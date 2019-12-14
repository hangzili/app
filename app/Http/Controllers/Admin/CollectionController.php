<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\CollectionModel;
use Illuminate\Support\Facades\Cookie;
class CollectionController extends Controller
{
    //收藏表添加
    public function add(Request $request)
    {
        $goods_id = $request->all('goods_id');
        $goods_id = $goods_id['goods_id'];
        $user = cookie::get('user');
        if(!$user){
            //入库
            $data=array('goods_id'=>$goods_id,'user_id'=>$user,'colle_time'=>time());
            CollectionModel::insert($data);
        }else{
            //没登陆
        }
    }
    //收藏表展示
    public function list()
    {
        $user = cookie::get('user');
        if($user){
            return json_encode(CollectionModel::get()->where('user_id',$user)->toArray());
        }else{
            //没登陆
        }
        
    }
}
