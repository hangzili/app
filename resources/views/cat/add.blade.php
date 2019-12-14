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
                                        <input type="hidden" name="path">
                                    </div>
                                    
                                    <div>
                                        <input class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button" value="添 加" id="btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

@endsection


<link rel="stylesheet" type="text/css" href="/uploadify/uploadify.css" />
<script src="/index/js/jquery.min.js?v=2.1.4"></script>
<script src="/uploadify/jquery.uploadify.js"></script>

<!-- <script src="{{asset('uploadify/jquery.uploadify.js')}}"></script> -->
<!-- <link rel="stylesheet" href="{{asset('uploadify/uploadify.css')}}"> -->
<script>
   $("#uploadify").uploadify({
      'swf': './uploadify/uploadify.swf',
      'uploader':'/cat/up',
      'onUploadSuccess':function(file,msg,data){
        $("input[name='path']").val(msg);
      }
    })


        $("#btn").click(function(){
            // alert(123);
            var _this = $(this);
            var c_name = $("input[name='c_name']").val();
            // alert(c_name);
            data = {};
            data.c_name = c_name;
            $.ajax({
                url:"{{url('cat/add_do')}}",
                data:data,
                type:"post",
                success:function(res){

                }
            })
        
        })
</script>