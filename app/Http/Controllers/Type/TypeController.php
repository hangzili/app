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

    // 执行添加
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

    // 展示
    public function typelist()
    {
        $typeInfo = TypeModel::paginate(10);
        return view('type.typelist',['typeInfo'=>$typeInfo]);
    }

    // 删除
    public function del(Request $request)
    {
        $t_id = $request->input('t_id');
        $attrInfo = TypeModel::where(['t_id'=>$t_id])->delete();
        if($attrInfo){
            return json_encode(['code'=>200,'msg'=>'删除成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'删除失败']);
        }
    }
}
