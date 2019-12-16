@extends('index.index')

@section('content')
    <!-- 符文本编辑器 -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
                    <div class="ibox-title">
                        <h5>商品添加表单 <small></small></h5>
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
                                        <label>商品名</label>
                                        <input type="text" placeholder="请输入您的商品名称" name="g_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>商品价格</label>
                                        <input type="number" placeholder="请输入价格" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>父类id</label>
                                       <select name="" id="">
                                            <option value=""></option>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                    <label>品牌id</label>
                                       <select name="" id="">
                                            <option value=""></option>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                        <label>商品图片上传</label>
                                        <input type="file" id="uploadify" style=""/>
                                        <input type="hidden" name="s_img">
                                    </div>
                                    <div class="form-group">
                                        <label>商品描述</label>
                                        <tr>
                                                <td class="text"><span class="bi_tian">*</span>内容：</td>
                                                <td colspan="2" class="text">
                                                <div style="width: 300px; height: 200px;">
                                                <script id="editor" type="text/plain" style="width:1024px;height:150px;"></script>
                                                </div>
                                                <script type="text/javascript">
                                                    var ue = UE.getEditor('editor');
                                                </script>
                                            </td>
                                        </tr>
                                    </div>
                                    <div>
                                        <input class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button" value="添 加" id="btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        <script src="/index/js/jquery.min.js?v=2.1.4"></script>
        <script>
     $(document).ready(function(){
        // $("#uploadify").uploadify({
        //     // alert(111);
        //     'swf':"{{asset('uploadify/uploadify.swf')}}",
        //     'uploader':'/three/up',
        //     'onUploadSuccess':function(file,msg,data){
        //         $("input[name='s_img']").html(msg);
        //         // console.log(msg);
                
        //     }
        // })

    
     $("#btn").click(function(){
        //  alert(123);
        

     });
})
        </script>

@endsection