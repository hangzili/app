<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    }

    public function up()
    {
        $request = request()->file('Filedata');//资源对象
        // dd($request);
        $ext = $request->getClientOriginalExtension();//扩展名
        // dd($ext);
        $path = $request->getRealPath();
        // dd($path);
        $filename = date('YmdHis',time()).'.'.$ext;//新文件的名字
        // dd($filename);
        \Storage::disk('public')->put($filename,file_get_contents($path));
        // dd(file_get_contents($path));
        $newPath ="/uploads/$filename";
        // dd($newPath);
        echo $newPath;
    }
}
