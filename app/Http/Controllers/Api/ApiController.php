<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Model\ImgModel;
use App\Model\UserModel;
use App\Model\BankModel;

class ApiController extends Controller
{
    // 轮播图接口
    public function imgApi()
    {
        $imgInfo = ImgModel::get();
        return json_encode(['code'=>200,$imgInfo]);
        // dd($imgInfo);
    }

    // 前台注册接口
    public function registApi(Request $request)
    {


        $info = request() -> all();
        $user_name=$info['user_name'];
        $where=['user_name'=>$user_name];
        $res=UserModel::where($where)->first();
        if($res){
           echo "用户名已存在";die;
        }else if($info['user_pwd']!=$info['user_pwd2']){
            echo "两次密码不一致";die;
            }else{
                    $user_pwd = md5($info['user_pwd']);
                    $data=['user_time'=>time(),'user_name'=>$info['user_name'],'user_pwd'=>$user_pwd,'user_email'=>$info['user_email']];
                    $a = UserModel::insert($data);
                    if($a){
                        echo "注册成功";die;
                    }else{
                        echo "注册失败";die;
                    }
        }
    }

    // 前台登录接口
    public function loginApi(Request $request)
    {
        $user_name = $request->input('user_name');
        $user_pwd = md5($request->input('user_pwd'));
        // dd($user_pwd);
        $loginInfo = UserModel::where(['user_name'=>$user_name,'user_pwd'=>$user_pwd])->first();
        if(empty($loginInfo)){
            echo "alert('没有此用户，请注册')";
        }else if($user_pwd !== $loginInfo->user_pwd){
            echo "alert('密码不正确，请重新输入')";
        }
        Cookie::queue('user',$loginInfo['u_id']);
        return json_encode(['code'=>200,'loginInfo'=>$loginInfo]);
    }

    // 前台银行卡添加接口
    public function addbakeApi(Request $request)
    {
        $info = $request->all();
        $user = cookie::get('user');
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
        $id = cookie::get('user');
        $bankInfo = BankModel::join('user','user.u_id','=','bank.user_id')->where('user.u_id','=',$id)->limit(4)->get();
        return json_encode(['code'=>200,'bankInfo'=>$bankInfo]);
    }
}
