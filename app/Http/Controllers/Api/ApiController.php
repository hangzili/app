<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Model\ImgModel;
use App\Model\UserModel;
use App\Model\BankModel;
use App\Model\GoodsModel;
use App\Model\CatModel;
use App\Model\BrandModel;
use App\Model\BetModel;
use App\Model\CarModel;



class ApiController extends Controller
{
    // 轮播图接口
    public function imgApi()
    {
        $imgInfo = ImgModel::get();
        $jsonp = $_REQUEST['jsonpCallback'];
        $arr = json_encode($imgInfo);
        echo "$jsonp($arr)";
        //return json_encode(['code'=>200,$imgInfo]);
        // dd($imgInfo);2345
        // dd($imgInfo);
    }

    // 前台银行卡添加接口
    public function addbakeApi(Request $request)
    {
        $info = $request->all();
        $user = \Session::get('user');
        $data=['bank_time'=>time(),
            'bank_name'=>$info['bank_name'],
            'user_name'=>$info['user_name'],
            'bank_tel'=>$info['bank_tel'],
            'user_id'=>$user
        ];
        $bakeInfo=BankModel::insert($data);
        return json_encode(['code'=>200,'bakeInfo'=>$bakeInfo]);
    }

    // 前台银行卡展示接口
    public function listbakeApi(Request $request)
    {
        $id = \Session::get('user');
        $bankInfo = BankModel::join('user','user.u_id','=','bank.user_id')->where('user.u_id','=',$id)->limit(4)->get();
        return json_encode(['code'=>200,'bankInfo'=>$bankInfo]);
    }


    // 前台注册接口
    public function registApi(Request $request)
    {
        $info = request() -> all();
        $user_name=$info['user_name'];


        $where=['user_name'=>$user_name];
        $res=UserModel::where($where)->first();
        if($res){
            echo json_encode('用户名已存在');
        }else if($info['user_pwd']!=$info['user_pwd2']){
            echo json_encode('两次输入密码不一致');exit;
            }else{
                    $user_pwd = md5($info['user_pwd']);
                    $data=['user_time'=>time(),'user_name'=>$info['user_name'],'user_pwd'=>$user_pwd,'user_email'=>$info['user_email']];
                    $a = UserModel::insert($data);
                    if($a){
                        echo json_encode('注册成功');exit;
                    }else{
                        echo json_encode('注册失败');exit;
                    }
        }
    }


    // 前台登录接口
    public function loginApi(Request $request)
    {

        $user_name = $request->input('user_name');
        // dd($user_name);
        $user_pwd = md5($request->input('user_pwd'));
        $loginInfo = UserModel::where(['user_name'=>$user_name])->first();
    //    dd($loginInfo);
        $u_id = $loginInfo['u_id'];
        // dd($u_id);
        
        
        if(empty($loginInfo)){
            echo json_encode('没有此用户，请注册');exit;
        }else if($user_pwd !== $loginInfo->user_pwd){
            echo json_encode('用户密码不对，请输入正确的密码');exit;
        }
        $data = \Session::put(['user'=>$u_id]);
        // $a = (\session::get('user'));
        // return json_encode($a);
        // echo Cookie::get('user');
        return json_encode('登陆成功');exit;
    }

    // 精品推荐接口
    public function highApi()
    {
        $highInfo = GoodsModel::limit(6)->get();
        return json_encode($highInfo);
    }

    // 酒水推荐
    public function drinksAPi()
    {
        $drinksInfo = GoodsModel::where(['cat_id'=>2])->get();
        // dd($drinksInfo);
        return json_encode($drinksInfo);
    }

    // 猜你喜欢
    public function likeApi()
    {
        $likeInfo = GoodsModel::orderBy('goods_id','desc')->limit(4)->get();
        // dd($likeInfo);
        return json_encode($likeInfo);
    }

    // 分类接口
    public function catApi()
    {
        $catInfo = CatModel::get();
        return json_decode($catInfo);
    }

    // 品牌接口
    public function brandApi()
    {
        $id = request()->all();
        // $catInfo = CatModel::where(['cat_id'=>3])->get();
        // $id = $catInfo[0]['cat_id'];
        // dd($id);
        $gbcInfo = BrandModel::where('brand.cat_id','=',$id)->get()->toArray();
        // dd($gbcInfo);
        return json_encode($gbcInfo);
    }

    // 品牌商品接口
    public function brGroApi()
    {
        $id = request()->all();
        // $catInfo = BrandModel::where(['brand_id'=>28])->get()->toArray();
        // // dd($catInfo);
        // $id = $catInfo[0]['brand_id'];
        // // dd($id);
        $brGroInfo = GoodsModel::where('goods.brand_id','=',$id)->get()->toArray();
        // dd($brGroInfo);
        return json_encode($brGroInfo);
    }

    // 前台购物车删除接口
    public function goodsDelApi(Request $request)
    {
        $id = $request->all();
        $carInfo = CarModel::where('goods_id','=',$id)->delete();
        return json_encode($carInfo);
    }

    // 前台库存和购物车数量接口
    public function gumcum(Request $request)
    {
        // $goods = GoodsModel::where(['goods_id'=>4])->get()->toArray();
        // $id = $goods[0]['goods_id'];
        $id = $request->all();
        // dd($id);
        $user = 2;
        $carInfo = CarModel::join('goods','car.goods_id','=','goods.goods_id')->where('car.user_id','=',$user)->where('car.goods_id','=',$id)->get()->toArray();
        // dd($carInfo);
        return json_encode($carInfo);
    }

    // 前台购物车数量修改
    public function carupnumApi(Request $request)
    {
        // $goods = GoodsModel::where(['goods_id'=>4])->get()->toArray();
        // $id = $goods[0]['goods_id'];
        // $num = 30;
        // $id = $request->all();
        // dd($id);
        $id = $request->all('goods_id');
        $num = $request->all('num');
        $id = $id['goods_id'];
        $num = $num['num'];
        // $num = 45;
        // dd($id);

        $user = 7;
        $carInfo = CarModel::where('goods_id','=',$id)->where('user_id','=',$user)->update(['c_num'=>$num]);
        // dd($carInfo);
        return json_encode($carInfo);
    }

    // 删除前台session()
    public function session()
    {
        $id = \Session::get('user');
        return json_encode($id);
        // $user = UserModel::where(['u_id'=>$id])->get()->toArray();
        // return json_encode($user);
    }
}
