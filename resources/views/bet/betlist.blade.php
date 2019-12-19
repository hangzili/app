@extends('index.index')
@section('content')

<div class="ibox-content">

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>商品id</td>
                <td>属性id</td>
                <td>属性值id</td>
                <td>操作</td>
            </tr>
        </thead>
    @foreach($betInfo as $k => $v)
        <tbody>
            <tr>
                <td>{{$v->b_id}}</td>
                <td>{{$v->g_name}}</td>
                <td>{{$v->t_name}}</td>
                <td>{{$v->a_name}}</td>
                <td><button type="button" id="{{$v['b_id']}}" class="btn del btn-danger">删除</button></td>
            </tr>
        </tbody>
    @endforeach
    </table>

</div>


@endsection
    <center>{{ $betInfo->links() }}</center>
</div>
@endsection
<script src="/index/js/jquery.min.js?v=2.1.4"></script>
<script>
    // 删除
    $(document).on('click','.del',function(){
        // alert(111);return;
        var b_id = $(this).attr('id');
        $.ajax({
            url:"/bet/del?b_id="+b_id,
            dataType:"json",
            success:function(res){
                if(res.code == 200){
                    alert(res.msg);
                    location.href="/bet/betlist";
                }else{
                    alert(res.msg);
                    location.href="/bet/betlist";
                }
            }
        })
    })
</script>
