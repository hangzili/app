<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\CarModel;
class CarController extends Controller
{
    //加入购物车
    public function add(Request $request)
    {
        $all = $request->all();
        $user_id = Cookie::get('user');
        if($user_id)
    }
}
