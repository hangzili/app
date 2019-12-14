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

    <div class="ibox-content">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-3 control-label">角色名称</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="角色名称" name="r_name" class="form-control">
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
        var r_name = $("input[name='r_name']").val();
        data.r_name = r_name;
        $.ajax({
            url:"/rbac/dorole",
            data:data,
            dataType:"json",
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    location.href="/rbac/rolelist";
                }else{
                    alert(res.msg);
                    location.href="/rbac/role";
                }
            }
        })
    })
</script>

@endsection