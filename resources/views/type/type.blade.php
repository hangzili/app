@extends('index.index')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>类型添加</title>
</head>
<body>
    <div class="ibox-content">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-3 control-label">属性名称</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="属性名称" name="t_name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <button class="btn btn-sm btn-info" type="button">添加</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<script src="/index/js/jquery.min.js?v=2.1.4"></script>
<script>
    $(document).on('click','.btn',function(){
        var data = {};
        var t_name = $("input[name='t_name']").val();
        // console.log(p_url);return;
        data.t_name = t_name;
        $.ajax({
            url:"/type/dotype",
            data:data,
            dataType:"json",
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    location.href="/type/typelist";
                }else{
                    alert(res.msg);
                    location.href="/type/type";
                }
            }
        })
    })
</script>

@endsection