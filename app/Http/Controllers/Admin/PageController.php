<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\PageModel;
use Illuminate\Support\Facades\Cookie;
class PageController extends Controller
{
    //浏览记录添加-------------传入商品的id
    public function add(Request $request)
    {
        $goods_id = $request->all('goods_id');
        $goods_id = $goods_id['goods_id'];
        $user = cookie::get('user');
        if($user){
            //存库
            $arr = array('goods_id'=>$goods_id,'user_id'=>$user,'cityr_time'=>time());
            PageModel::insert($arr);
            // dump($arr);
        }else{
            //存cookie
            $cookie_get = json_decode(cookie('page'),true)?:[];
            $arr['goods_'.$goods_id]=[
                'goods_id'=>$goods_id,
                'add_time'=>time()
            ];
            $data=array_merge($cookie_get,$arr);
            Cookie::make('page',json_encode($data));
        }
    }
    //浏览记录表展示
    public function list()
    {
        $user = cookie::get('user');
        if($user){
            //登陆库
            return json_encode(PageModel::get()->toArray());
        }else{
            //没登陆  cookie
            $page_list = json_decode(Cookie::get('page'));
            return $page_list;
        }
    }
}
