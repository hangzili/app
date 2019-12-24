<?php

namespace App\Http\Controllers\Rbac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\HuserModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;
// use App\Http\Controllers\Rbac\Redis;
use DB;

class LoginController extends Controller
{
    // 用户注册
    public function regis()
    {
        return view('rbac.regis');
    }

    // 用户注册执行
    public function doregis(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $time = time();
        $regInfo = HuserModel::create([
            'u_name' => $data['u_name'],
            'u_emali' => $data['u_emali'],
            'u_pwd' => $data['u_pwd'],
            'time' => $time
        ]);
        if($regInfo){
            return json_encode(['code'=>200,'msg'=>'注册成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'注册失败']);
        }
    }

    // 用户登录
    public function login()
    {
        return view('rbac.login');
    }

    // 用户登录执行
    public function dologin(Request $request)
    {
        $u_name = $request->all('u_name');
        // dd($u_name);
        $u_pwd = $request->all('u_pwd');
        // dd($u_emali);
        $loginInfo = HuserModel::where(['u_name'=>$u_name,'u_pwd'=>$u_pwd])->first();
        // dd($loginInfo);
        if(!$loginInfo){
            return json_encode(['code'=>203,'msg'=>'用户名或者密码不正确，请重新输入']);die;
        }
        if($loginInfo){
            \Session::put(['username'=>$u_name]);
            return json_encode(['code'=>200,'msg'=>'登录成功']);
           
            // Redis::set('username',$u_name,86400);
        }else{
            return json_encode(['code'=>201,'msg'=>'登录失败']);
        }
    }
}
