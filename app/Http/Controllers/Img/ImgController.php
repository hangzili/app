<?php

namespace App\Http\Controllers\Img;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ImgModel;

class ImgController extends Controller
{
    public function img()
    {
        return view('img.img');
    }

    // 轮播图添加执行
    public function doimg(Request $request)
    {
        $data = $request->all();
        $img_name = $data['img_name'];
        $img_url = $data['img_url'];
        $time = time();
        // echo $newPath;
        $imgInfo = ImgModel::create([
            'img_name' => $img_name,
            'img_url' => $img_url,
            'time' => $time
        ]);
        if($imgInfo){
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'添加失败']);
        }
        

    }
    //顶部图片上传
    public function up(Request $request)
    {
        $requestobj = $request->file("Filedata");
        $ext = $requestobj->getClientOriginalExtension();
        $path = $requestobj->getRealPath();
        $filename = date("YmdHis",time()).".".$ext;
        \Storage::disk('public')->put($filename,file_get_contents($path));
        $newPath = "/uploads/$filename";
        echo $newPath;
    }

    // 展示
    public function imglist()
    {
        $imgInfo = ImgModel::get();
        return view('img.imglist',['imgInfo'=>$imgInfo]);
    }

    // 删除
    public function del(Request $request)
    {
        $img_id = $request->input('img_id');
        $imgInfo = ImgModel::where(['img_id'=>$img_id])->delete();
        if($imgInfo){
            return json_encode(['code'=>200,'msg'=>'删除成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'删除失败']);
        }
    }
}
