@extends('index.index')

@section('content')
<div class="ibox-title">
                        <h5>分类添加表单 <small></small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form role="form">
                                    <div class="form-group">
                                        <label>分类名</label><br>
                                            <select name="cat_id" id="cat_id">
                                            <?php foreach($catAll as $k=>$v){?>
                                                <option value="<?php echo $v['cat_id']?>"><?php echo $v["c_name"]?></option>
                                            <?php }?>
                                            </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>品牌名称</label>
                                        <input type="text" placeholder="请输入您的分类名称" name="b_name" class="form-control">
                                    </div>
                                    
                                    <div>
                                        <input class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button" value="添 加" id="btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

@endsection


<!-- <script src="{{asset('uploadify/jquery.uploadify.js')}}"></script> -->
<!-- <link rel="stylesheet" href="{{asset('uploadify/uploadify.css')}}"> -->

<script src="/uploadify/jquery.js"></script>
<script src="/uploadify/jquery.uploadify.js"></script>
<script>
    $(document).ready(function(){
        
    $("#btn").click(function(){
            // alert(123);
            var _this = $(this);
            var b_name = $("input[name='b_name']").val();
            var cat_id = $('#cat_id').val();
            // alert(c_name);
            data = {};
            data.cat_id = cat_id;
            data.b_name = b_name;
            $.ajax({
                url:"{{url('brand/add_do')}}",
                data:data,
                type:"post",
                success:function(res){

                }
            })
        
        })
    });
</script>