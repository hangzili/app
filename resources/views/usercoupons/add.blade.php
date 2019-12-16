@extends('index.index')

@section('content')

    <div class="ibox-content">
        <div class="row">
            <div class="col-sm-5 m-b-xs">
                <label for="title">价格</label>
                <select  name="cou_id" class="input-sm form-control input-s-sm inline">
                    @foreach($data  as $v)
                    <option value="{{$v->cou_id}}">{{$v->cou_price}}</option>
                    @endforeach
                </select>
                <label for="title">用户</label>
                <select name="u_id" class="input-sm form-control input-s-sm inline">
                    @foreach($info  as $v)
                        <option value="{{$v->u_id}}">{{$v->user_name}}</option>
                    @endforeach
                </select>
                <div>
                    <input type="button" name="btn"  id="sub" value="提交" class="btn btn-primary btn-lg active">
                </div>
            </div>

    </div>

</div>
    <script src="/index/js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $("input[name='btn']").click(function(){
                var data = {};
                var  cou_id = $("[name='cou_id']").val();
                var  u_id   = $("[name='u_id']").val();
                // data.json="1";
                data. cou_id =  cou_id;
                data. u_id =  u_id;
                $.ajax({
                    type : "post",
                    data : data,
                    dataType : "json",
                    url : "{{('/usercoupons/add_do')}}",
                    success:function(res){
                        if (res==1){
                            alert('用户优惠卷添加成功');
                            location.href="{{url('usercoupons/list')}}";
                        }else {
                            alert('用户优惠卷不可为空');
                            location.href="#";
                        }
                    }
                });
            });
        });
    </script>

@endsection