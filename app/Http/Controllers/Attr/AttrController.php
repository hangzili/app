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
        return view('attr.attr');
    }

    public function doattr(Request $request)
    {
        $a_name = $request->input('a_name');
        // dd($t_id);
        $time = time();
        // dd($p_url);
        $attrInfo = AttrModel::create([
            'a_name' => $a_name,
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
