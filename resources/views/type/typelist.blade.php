@extends('index.index')
@section('content')

<div class="ibox-content">

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>类型名称</td>
                <td>操作</td>
            </tr>
        </thead>
    @foreach($typeInfo as $k => $v)
        <tbody>
            <tr>
                <td>{{$v->t_id}}</td>
                <td>{{$v->t_name}}</td>
                <td><button type="button" id="{{$v->t_id}}" class="btn del btn-danger">删除</button></td>
            </tr>
        </tbody>
    @endforeach
    </table>
    <center>{{ $typeInfo->links() }}</center>

</div>
@endsection
<script src="/index/js/jquery.min.js?v=2.1.4"></script>
<script>
    // 删除
    $(document).on('click','.del',function(){
        // alert(111);return;
        var t_id = $(this).attr('id');
        $.ajax({
            url:"/type/del?t_id="+t_id,
            dataType:"json",
            success:function(res){
                if(res.code == 200){
                    alert(res.msg);
                    location.href="/type/typelist";
                }else{
                    alert(res.msg);
                    location.href="/type/typelist";
                }
            }
        })
    })
</script>