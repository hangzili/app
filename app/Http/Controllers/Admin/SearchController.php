<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\SearchModel;
use Illuminate\Support\Facades\Cookie;
class SearchController extends Controller
{
    //搜索记录表
    public function add(Request $request)
    {
        $search_name = $request->all('search_name');
        $search_name = $search_name['search_name'];
        $user = cookie::get('user');
        if($user){
            //存库
            $arr = array('search_name'=>$search_name,'user_id'=>$user,'search_time'=>time());
            SearchModel::insert($arr);
            // dump($arr);
        }else{
            //存cookie
            $cookie_get = json_decode(cookie('search'),true)?:[];
            $arr['search'.time()]=[
                'search_name'=>$search_name,
                'search_time'=>time()
            ];
            $data=array_merge($cookie_get,$arr);
            Cookie::make('search',json_encode($data));
        }
    }
    //搜索记录表展示
    public function list()
    {
        $user = cookie::get('user');
        if($user){
            //登陆库
            return json_encode(SearchModel::get()->toArray());
        }else{
            //没登陆  cookie
            $page_list = json_decode(Cookie::get('search'));
            return $page_list;
        }
    }
}
