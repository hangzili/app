<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\uscoupModel;


class UsercouponsController extends Controller
{
    //用户优惠券添加
    public function add()
    {
        $where=['ls_show'=>'1'];
        $data=DB::table('coupons')->where($where)->get();
        $info=DB::table('user')->get();

        return view ("usercoupons/add",['data'=>$data,'info'=>$info]);
    }
    //用户优惠券添加执行
    public function add_do(Request $request)
    {
        $info = request() -> all();
//        dd($info);
            $data=['time'=>time(),
                'cou_id'=>$info['cou_id'],
                'u_id'=>$info['u_id']];
//            dump($data);
                $a=uscoupModel::insert($data);
            if($a){
                echo 1;
            }else{
                echo 2;
            }
    }
    //优惠券展示
    public function list()
    {
        $data=uscoupModel::join('user','user_coupons.u_id','=','user.u_id')
            ->join('coupons','user_coupons.cou_id','=','coupons.cou_id')
            ->paginate(3);
        return view ("usercoupons/list",['data'=>$data]);
    }
    public function del(Request $request){
        $info = request() -> all();
        $u_c_id=$info['u_c_id'];
        $where=['u_c_id'=>$u_c_id];
//        dd($where);
        $res = DB::table('user_coupons')->where($where)->delete();
        if($res){
            return redirect('usercoupons/list');
        }

    }
}
