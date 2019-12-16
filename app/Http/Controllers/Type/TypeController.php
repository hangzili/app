<?php

namespace App\Http\Controllers\Type;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TypeModel;

class TypeController extends Controller
{
    public function type()
    {
        return view('type.type');
    }

    public function dotype(Request $request)
    {
        $t_name = $request->input('t_name');
        // dd($p_url);
        $typeInfo = TypeModel::create([
            't_name' => $t_name,
        ]);
        // dd($roleInfo);
        if($typeInfo){
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'添加失败']);
        }
    }

    public function typelist()
    {
        $typeInfo = TypeModel::get();
        return view('type.typelist',['typeInfo'=>$typeInfo]);
    }
}
