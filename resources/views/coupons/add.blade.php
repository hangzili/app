@extends('index.index')

@section('content')

    <div class="ibox-content">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title">优惠价格</label>
                    <input id="title" type="text" class="form-control" name="cou_price" placeholder="请输入价格">
                    <label for="title">过期时间</label>
                    <input id="title" type="text" class="form-control" name="overdue_time" placeholder="列:2019年9月 18日">
                    <label>是否显示</label>
                    <div class="col-md-2">
                        <div class="form-group" id="toastTypeGroup">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="ls_show" value="1" checked="">是
                                </label>
                            </div>
                            <div class="radio">
                                <label class="radio">
                                    <input type="radio" name="ls_show" value="2">否
                                </label>
                            </div>

                        </div>

                    </div>

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
                var  cou_price = $("input[name='cou_price']").val();
                var  overdue_time = $("input[name='overdue_time']").val();
                var  ls_show = $("input[name='ls_show']:checked").val();

                // alert(s_show);
                data. cou_price =  cou_price;
                data.overdue_time =  overdue_time;
                data. ls_show =  ls_show;

                $.ajax({
                    data : data,
                    dataType : "json",
                    url : "/coupons/add_do",
                    success:function(res){
                        if (res==1){
                            alert('优惠卷添加成功');
                            location.href="{{url('coupons/list')}}";
                        }else if(res==2){
                            alert('优惠卷不可为空');
                            location.href="#";
                        }else {
                            alert('添加链接');
                            location.href="#";
                        }
                    }
                });
            });
        });
    </script>



@endsection