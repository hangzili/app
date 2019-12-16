@extends('index.index')
@section('content')

<div class="ibox-content">

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>图片名称</td>
                <td>图片</td>
                <td>操作</td>
            </tr>
        </thead>
    @foreach($imgInfo as $k => $v)
        <tbody>
            <tr>
                <td>{{$v->img_id}}</td>
                <td>{{$v->img_name}}</td>
                <td><img src="{{$v->img_url}}" width="50"></td>
                <td><button type="button" id="{{$v['img_id']}}" class="btn del btn-danger">删除</button></td>
            </tr>
        </tbody>
    @endforeach
    </table>

</div>
@endsection
<script src="/index/js/jquery.min.js?v=2.1.4"></script>
<script>
    // 删除
    $(document).on('click','.del',function(){
        // alert(111);return;
        var img_id = $(this).attr('id');
        $.ajax({
            url:"/img/del?img_id="+img_id,
            dataType:"json",
            success:function(res){
                if(res.code == 200){
                    alert(res.msg);
                    location.href="/img/imglist";
                }else{
                    alert(res.msg);
                    location.href="/img/imglist";
                }
            }
        })
    })
</script>