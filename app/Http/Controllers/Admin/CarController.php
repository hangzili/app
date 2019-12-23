<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\CarModel;
class CarController extends Controller
{
    //加入购物车
    public function is_login(Request $request)
    {
        // $all = $request->all();
        $user_id = \Session::get('user');
        if(empty($user_id)){
            echo "<script>alert('请先登录！')</script>";
            exit;
        }else{
            return redirect("/car/add");
        }
    }

    public function add()
    {
        // $u_id = 1;
        // Cookie::queue('user',$u_id);
        $post = request()->all();
        // $goods_id = explode($post);
        $goods_id = json_decode($post['goods_id']);
        // $goods_id = explode($post);
        // $goods_id = intval($goods_id);
        // var_dump($goods_id);
        $user_id = \Session::get('user');
        $user_id = intval($user_id);
        // var_dump($user_id);
        $model = new CarModel;
        $sql = $model->insert(
            [
                'user_id'=>$user_id,
                'goods_id'=>$goods_id,
                ]
        );
        // var_dump($sql);
        if($sql){
            return json_encode(1);
        }else{
            return json_encode(0);
        }
    }
}
