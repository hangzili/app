<?php

namespace App\Http\Controllers\Rbac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserRoleModel;
use App\Model\HuserModel;
use App\Model\RoleModel;

class UserRoleController extends Controller
{
    public function user_role()
    {
        $huserInfo = HuserModel::get();
        $roleInfo = RoleModel::get();
        return view('rbac.user_role',['huserInfo'=>$huserInfo,'roleInfo'=>$roleInfo]);
    }

    public function do_user_role(Request $request)
    {
        $u_id = $request->input('u_id');
        $r_id = $request->input('r_id');
        $UserRoleInfo = UserRoleModel::create([
            'u_id' => $u_id,
            'r_id' => $r_id
        ]);
        if($UserRoleInfo){
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'添加失败']);
        }
    }

    public function user_role_list()
    {
        $UserRoleInfo = new UserRoleModel;
        $URInfo = $UserRoleInfo->join('huser','user_role.u_id','=','huser.u_id')->join('role','user_role.r_id','=','role.r_id')->get();
        // dd($URInfo);
        
        return view('rbac.user_role_list',['URInfo'=>$URInfo]);
    }
}
