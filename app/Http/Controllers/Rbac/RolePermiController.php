<?php

namespace App\Http\Controllers\Rbac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\RolePermiModel;
use App\Model\RoleModel;
use App\Model\PermiModel;

class RolePermiController extends Controller
{
    public function role_permi()
    {
        $roleInfo = RoleModel::get();
        $permInfo = PermiModel::get();
        return view('rbac.role_permi',['permInfo'=>$permInfo,'roleInfo'=>$roleInfo]);
    }

    public function do_role_permi(Request $request)
    {
        $r_id = $request->input('r_id');
        $p_id = $request->input('p_id');
        $RolePermiInfo = RolePermiModel::create([
            'r_id' => $r_id,
            'p_id' => $p_id
        ]);
        if($RolePermiInfo){
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'添加失败']);
        }
    }

    public function role_permi_list()
    {
        $RolePermiInfo = new RolePermiModel;
        $RPInfo = $RolePermiInfo->join('role','role_permi.r_id','=','role.r_id')->join('permi','role_permi.p_id','=','permi.p_id')->get();
        return view('rbac.role_permi_list',['RPInfo'=>$RPInfo]);
    }
}
