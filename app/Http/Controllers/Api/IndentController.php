<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\IndentModel;
class IndentController extends Controller
{
    public function IndentAdd()
    {
    $post = request()->all();//接收前台传过来的ID（信息）
    $model = new IndentModel;
    $insert = $model->insert($post);
    return json_encode(['code'=>200,'insert'=>$insert]);

    }
}
