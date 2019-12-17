<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CatModel;
class CatController extends Controller
{
    public function add()
    {
        return view("cat/add");
    }

    public function add_do()
    {
        $post = request()->all();
        // dd($post);
        $model = new CatModel;
        $res = $model -> insert($post);
        // dd($res);
        if($res){
            echo "成功";
        }else{
            echo "失败";
        }

    }

    public function up(Request $request)
    {
        $requestobj = $request->file("Filedata");
        // dd($requestobj);
        $ext = $requestobj->getClientOriginalExtension();
        $path = $requestobj->getRealPath();
        $filename = date("YmdHis",time()).".".$ext;
        \Storage::disk('public')->put($filename,file_get_contents($path));
        $newPath = "/uploads/$filename";
        echo $newPath;
    }

    public function list()
    {
        $model = new CatModel;
        $list = $model->all()->toArray();
        // dd($list);
        return view ('cat/list',['list'=>$list]);
    }

    public function del()
    {
        $id = request()->all();
        // dd($id);
        $model = new CatModel;
        $del = $model->where(['cat_id'=>$id])->delete();
        if($del){
            echo 1;
        }else{
            echo 0;
        }

    }
}
