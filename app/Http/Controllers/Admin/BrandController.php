<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BrandModel;
use App\Model\CatModel;

class BrandController extends Controller
{
    public function add()
    {
        $cat = new CatModel;
        $catAll = $cat->all()->toArray();
        // dd($catAll);
        return view ("brand/add",['catAll'=>$catAll]);
    }

    public function add_do()
    {
        $post = request()->all();
        // dd($post);
        $model = new BrandModel;
        $res = $model->insert($post);
        // dd($res);
        if($res){
            echo "成功";
        }else{
            echo "失败";
        }
    }

    public function list()
    {
        $model = new BrandModel;
        $list = $model -> join('cat','brand.cat_id','=','cat.cat_id')->paginate(5);
        // $list = $list['data'];
        // dd($list);
        return view("brand/list",['list'=>$list]);
    }

    public function del()
    {
        $id = request()->all();
        // dd($id);
        $model = new BrandModel;
        $del = $model->where(['brand_id'=>$id])->delete();
        // dd($del);
        if($del){
            echo 1;
        }else{
            echo 0;
        }
    }
}
