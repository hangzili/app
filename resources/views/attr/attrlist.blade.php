@extends('index.index')
@section('content')

<div class="ibox-content">

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>属性名称</td>
                <td>操作</td>
            </tr>
        </thead>
    @foreach($attrInfo as $k => $v)
        <tbody>
            <tr>
                <td>{{$v->a_id}}</td>
                <td>{{$v->a_name}}</td>
                <td><button type="button" id="{{$v['a_id']}}" class="btn del btn-danger">删除</button></td>
            </tr>
        </tbody>
    @endforeach
    </table>
    <center>{{ $attrInfo->links() }}</center>

</div>


@endsection
<script src="/index/js/jquery.min.js?v=2.1.4"></script>
<script>
    // 删除
    $(document).on('click','.del',function(){
        // alert(111);return;
        var a_id = $(this).attr('id');
        $.ajax({
            url:"/attr/del?a_id="+a_id,
            dataType:"json",
            success:function(res){
                if(res.code == 200){
                    alert(res.msg);
                    location.href="/attr/attrlist";
                }else{
                    alert(res.msg);
                    location.href="/attr/attrlist";
                }
            }
        })
    })
</script>
