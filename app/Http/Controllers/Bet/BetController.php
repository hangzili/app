<?php
namespace App\Http\Controllers\Bet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TypeModel;
use App\Model\AttrModel;
use App\Model\GoodsModel;
use App\Model\BetModel;

class BetController extends Controller
{
    // 添加
    public function betadd()
    {
        $typeInfo = TypeModel::get();
        $attrInfo = AttrModel::get();
        $goodsInfo = GoodsModel::get();
        return view('bet.betadd',['typeInfo'=>$typeInfo,'attrInfo'=>$attrInfo,'goodsInfo'=>$goodsInfo]);
    }

    // 添加执行
    public function dobetadd(Request $request)
    {
        $goods_id = $request->input('goods_id');
        $t_id = $request->input('t_id');
        $a_id = $request->input('a_id');
        $time = time();
        $betInfo = BetModel::create([
            'goods_id' => $goods_id,
            't_id' => $t_id,
            'a_id' => $a_id,
            'time' => $time
        ]);
        if($betInfo){
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'添加失败']);
        }
    }

    // 展示
    public function betlist()
    {
        $betInfo = BetModel::join('goods','goods.goods_id','=','between.goods_id')
        ->join('attr','attr.a_id','=','between.a_id')
        ->join('type','type.t_id','=','between.t_id')
        ->paginate(10);
        // dd($betInfo);
        return view('bet.betlist',['betInfo'=>$betInfo]);
    }

    // 删除
    public function del(Request $request)
    {
        $b_id = $request->input('b_id');
        $betInfo = BetModel::where(['b_id'=>$b_id])->delete();
        if($betInfo){
            return json_encode(['code'=>200,'msg'=>'删除成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'删除失败']);
        }
    }
}
