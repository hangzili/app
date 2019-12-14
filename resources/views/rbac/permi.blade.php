@extends('index.index')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>权限添加</title>
</head>
<body>
    <div class="ibox-content">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-3 control-label">权限路径</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="权限路径" name="p_url" class="form-control">
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
        var p_url = $("input[name='p_url']").val();
        // console.log(p_url);return;
        data.p_url = p_url;
        $.ajax({
            url:"/rbac/dopermi",
            data:data,
            dataType:"json",
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    location.href="/rbac/permilist";
                }else{
                    alert(res.msg);
                    location.href="/rbac/permi";
                }
            }
        })
    })
</script>

@endsection