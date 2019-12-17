﻿<?php


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
        $jsonp = $_REQUEST['jsonpCallback'];
        $arr = json_encode($imgInfo);
        echo "$jsonp($arr)";
        //return json_encode(['code'=>200,$imgInfo]);
        // dd($imgInfo);2345
<<<<<<< HEAD
=======
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
        $user_pwd = md5($request->input('user_pwd'));
        $loginInfo = UserModel::where(['user_name'=>$user_name])->first();
        if(empty($loginInfo)){
            echo json_encode('没有此用户，请注册');exit;
        }else if($user_pwd !== $loginInfo->user_pwd){
            echo json_encode('用户密码不对，请输入正确的密码');exit;
        }
        Cookie::queue('user',$loginInfo['u_id']);
        echo json_encode('登陆成功');exit;
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
>>>>>>> 4b0cc385c3e552ca2b4e4ebc0ff90edd6cc0870f
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
        $user_pwd = md5($request->input('user_pwd'));
        $loginInfo = UserModel::where(['user_name'=>$user_name])->first();
        if(empty($loginInfo)){
            echo json_encode('没有此用户，请注册');exit;
        }else if($user_pwd !== $loginInfo->user_pwd){
            echo json_encode('用户密码不对，请输入正确的密码');exit;
        }
        Cookie::queue('user',$loginInfo['u_id']);
        echo json_encode('登陆成功');exit;
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
        // $bankInfo = BankModel::join('user','user.u_id','=','bank.user_id')->where('user.u_id','=',$id)->limit(4)->get();
        $list = BankModel::get();
        return json_encode($list);
    }
}
