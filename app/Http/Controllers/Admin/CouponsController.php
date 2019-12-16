<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\CouModel;


class CouponsController extends Controller
{
        //优惠券添加
        public function add()
        {
            return view ("coupons/add");
        }
        //优惠券添加执行
        public function add_do(Request $request)
    {
        $info = request() -> all();
//        dd($info);

        if(isset($info['cou_price'])&& isset($info['overdue_time'])){
            $data=['time'=>time(),
                'cou_price'=>$info['cou_price'],
                'overdue_time'=>$info['overdue_time'],
                'ls_show'=>$info['ls_show']];
            $a = DB::table('coupons')->insert($data);

            if($a){
                echo 1;
            }else{
                echo 3;
            }
        }else{
            echo 2;
        }

    }
        //优惠券展示
        public function list()
        {
            $where=['ls_show'=>'1'];

            $data = CouModel::where($where)->paginate(3);
//            dd($data);
            return view ("coupons/list",['data'=>$data]);
        }
        //优惠卷删除
    public function del(Request $request){
        $info = request() -> all();
        $cou_id=$info['cou_id'];
        $where=['cou_id'=>$cou_id];
        $res = DB::table('coupons')->where($where)->delete();

        if($res){
            return redirect('coupons/list');
        }

    }
}
