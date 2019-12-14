<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\AddressModel;
use App\Admin\RegionModel;
class AddressController extends Controller
{
    //用户收货地址添加
    public function add()
    {
        return json_encode(RegionModel::get()->toArray());
    }
    //用户收货地址添加执行页面---------添加成功，传入数组
    public function add_do(Request $request)
    {
        $all = $request->all();
        $add = AddressModel::insert($all);
        if($add){
            return 1;
        }else{
            return 2;
        }
    }
    //用户收货地址展示表 ---------------查询成功，传入用户id
    public function list(Request $request)
    {
        $user_id = $request->all('user_id');
        return json_encode(AddressModel::get()->where('user_id',$user_id['user_id'])->toArray());
    }
}
