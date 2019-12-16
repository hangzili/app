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
            <label class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-10">
                <select class="form-control m-b" name="r_id">
                @foreach($roleInfo as $k => $v)
                    <option value="<?php echo $v['r_id']?>"><?php echo $v['r_name']?></option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">角色权限</label>
            <div class="col-sm-10">
                <select class="form-control m-b" name="p_id">
                @foreach($permInfo as $k => $v)
                    <option value="<?php echo $v['p_id']?>"><?php echo $v['p_url']?></option>
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
        var r_id = $("[name='r_id']").val();
        var p_id = $("[name='p_id']").val();
        // console.log(r_id);
        // console.log(p_id);return;
        data.r_id = r_id;
        data.p_id = p_id;
        $.ajax({
            url:"/rbac/do_role_permi",
            data:data,
            type:"GET",
            dataType:"json",
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    location.href="/rbac/role_permi_list";
                }else{
                    alert(res.msg);
                    location.href="/rbac/role_permi";
                }
            }
        })
    })

</script>

@endsection