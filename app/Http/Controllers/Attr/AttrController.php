<?php

namespace App\Http\Controllers\Attr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AttrModel;
use App\Model\TypeModel;

class AttrController extends Controller
{
    public function attr()
    {
        $typeInfo = TypeModel::get();
        return view('attr.attr',['typeInfo'=>$typeInfo]);
    }

    public function doattr(Request $request)
    {
        $a_name = $request->input('a_name');
        $t_id = $request->input('t_id');
        // dd($t_id);
        $time = time();
        // dd($p_url);
        $attrInfo = AttrModel::create([
            'a_name' => $a_name,
            't_id' => $t_id,
            'time' => $time
        ]);
        // dd($roleInfo);
        if($attrInfo){
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'添加失败']);
        }
    }

    public function attrlist()
    {
        $attrInfo = AttrModel::get();
        return view('attr.attrlist',['attrInfo'=>$attrInfo]);
    }
}
