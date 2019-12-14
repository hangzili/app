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
            <label class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <select class="form-control m-b" name="u_id">
                @foreach($huserInfo as $k => $v)
                    <option value="<?php echo $v['u_id']?>"><?php echo $v['u_name']?></option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-10">
                <select class="form-control m-b" name="r_id">
                @foreach($roleInfo as $k => $v)
                    <option value="<?php echo $v['r_id']?>"><?php echo $v['r_name']?></option>
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
        var u_id = $("[name='u_id']").val();
        var r_id = $("[name='r_id']").val();
        data.u_id = u_id;
        data.r_id = r_id;
        $.ajax({
            url:"/rbac/do_user_role",
            data:data,
            type:"GET",
            dataType:"json",
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    location.href="/rbac/user_role_list";
                }else{
                    alert(res.msg);
                    location.href="/rbac/user_role";
                }
            }
        })
    })

</script>

@endsection