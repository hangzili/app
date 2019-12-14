<?php

namespace App\Http\Controllers\Rbac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PermiModel;

class PermiController extends Controller
{
    // 权限添加视图
    public function permi()
    {
        return view('rbac.permi');
    }

    public function dopermi(Request $request)
    {
        $p_url = $request->input('p_url');
        // dd($p_url);
        $permInfo = PermiModel::create([
            'p_url' => $p_url,
        ]);
        // dd($roleInfo);
        if($permInfo){
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'添加失败']);
        }
    }

    public function permilist()
    {
        $permInfo = PermiModel::get();
        return view('rbac.permilist',['permInfo'=>$permInfo]);
    }
}
