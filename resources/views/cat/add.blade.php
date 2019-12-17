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
                                        <label>分类名</label>
                                        <input type="text" placeholder="请输入您的分类名称" name="c_name" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>商品图片上传</label>
                                        <input name="img" type="file" id="uploadify" class="" />
                                        <input type="hidden" name="c_img">
                                    </div>
                                    
                                    <div>
                                        <input class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button" value="添 加" id="btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

@endsection
<script src="/uploadify/jquery.js"></script>
<script src="/uploadify/jquery.uploadify.js"></script>
<link rel="stylesheet" href="{{asset('uploadify/uploadify.css')}}">


<script>
$(document).ready(function(){
   $("#uploadify").uploadify({
      'swf': '{{asset("uploadify/uploadify.swf")}}',
      'uploader':'/cat/up',
      'onUploadSuccess':function(file,msg,data){
        $("input[name='c_img']").val(msg);
      }
    })


        $("#btn").click(function(){
            // alert(123);
            var _this = $(this);
            var c_name = $("input[name='c_name']").val();
            var c_img = $("input[name='c_img']").val();
            // alert(c_name);
            data = {};
            data.c_name = c_name;
            data.c_img = c_img;
            $.ajax({
                url:"{{url('cat/add_do')}}",
                data:data,
                type:"post",
                success:function(res){

                }
            })
        
        })
    })
</script>