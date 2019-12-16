<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ImgModel;

class ApiController extends Controller
{
    // 轮播图接口
    public function imgApi()
    {
        $imgInfo = ImgModel::get();
        return json_encode(['code'=>200,$imgInfo]);
        // dd($imgInfo);
    }
}
