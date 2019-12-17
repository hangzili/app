<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CatModel;
use App\Model\BrandModel;
use App\Model\GoodsModel;
class GoodsController extends Controller
{
    public function add()
    {
        $CatModel = new CatModel;
        $catAll = $CatModel->all()->toArray();
        // dd($catAll);
        return view ("goods/add",['catAll'=>$catAll]);
    }

    public function ajax()
    {
        $id = request()->all();
        // dd($id);
        $model = new BrandModel;
        $brandAll = $model->where(['cat_id'=>$id])->get()->toArray();
        // dd($brandAll); 
        return $brandAll;
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

    public function add_do()
    {
        $post = request()->all();
        // dd($post);
        $model = new GoodsModel;
        $res = $model->insert($post);
        if($res){
            echo "成功";
        }else{
            echo "失败";
        }
    }

    public function list()
    {
        $model = new GoodsModel;
        $list = $model->join('cat','cat.cat_id','=','goods.cat_id')
                      ->join('brand','brand.brand_id','=','goods.brand_id')
                      ->get()->toArray();
        // dd($list);
        return view('goods/list',['list'=>$list]);
    }

    public function del()
    {
        $model = new GoodsModel;
        $id = request()->all();
        // dd($id);
        $del = $model->where(['goods_id'=>$id])->delete();
        if($del){
            echo 1;
        }else{
            echo 0;
        }
    }
}
