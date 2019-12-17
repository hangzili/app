@extends('index.index')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form>
        <div class="form-group">
            <label class="col-sm-2 control-label">属性</label>
            <div class="col-sm-10">
                <select class="form-control m-b" name="goods_id">
                @foreach($goodsInfo as $k => $v)
                    <option value="<?php echo $v['goods_id']?>"><?php echo $v['g_name']?></option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">属性</label>
            <div class="col-sm-10">
                <select class="form-control m-b" name="t_id">
                @foreach($typeInfo as $k => $v)
                    <option value="<?php echo $v['t_id']?>"><?php echo $v['t_name']?></option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">属性值</label>
            <div class="col-sm-10">
                <select class="form-control m-b" name="a_id">
                @foreach($attrInfo as $k => $v)
                    <option value="<?php echo $v['a_id']?>"><?php echo $v['a_name']?></option>
                @endforeach
                </select>
            </div>
        </div>

        <button type="button" class="btn btn-default">提交</button>
    </form>
</body>
</html>
<script src="/index/js/jquery.min.js?v=2.1.4"></script>

<script>
    $('.btn').click(function(){
        // alert(111);
        var data = {};
        var goods_id = $("[name='goods_id']").val();
        var t_id = $("[name='t_id']").val();
        var a_id = $("[name='a_id']").val();
        // console.log(t_id);
        // console.log(a_id);return;
        data.goods_id = goods_id;
        data.t_id = t_id;
        data.a_id = a_id;
        $.ajax({
            url:"/bet/dobetadd",
            data:data,
            type:"GET",
            dataType:"json",
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    location.href="/bet/betlist";
                }else{
                    alert(res.msg);
                    location.href="/bet/betadd";
                }
            }
        })
    })

</script>

@endsection