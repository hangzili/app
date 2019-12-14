<?php

namespace App\Http\Controllers\Rbac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\RoleModel;

class RoleController extends Controller
{
    // 角色添加视图
    public function role()
    {
        return view('rbac.role');
    }

    // 角色执行添加
    public function dorole(Request $request)
    {
        $r_name = $request->input('r_name');
        // dd($r_name);
        $roleInfo = RoleModel::create([
            'r_name' => $r_name,
        ]);
        // dd($roleInfo);
        if($roleInfo){
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'添加失败']);
        }
    }

    // 角色展示
    public function rolelist()
    {
        $roleInfo = RoleModel::get();
        return view('rbac.rolelist',['roleInfo'=>$roleInfo]);
    }
}
