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
                                        <input type="number" placeholder="请输入价格" class="form-control" name="g_price">
                                    </div>
                                    <div class="form-group">
                                        <label>商品库存</label>
                                        <input type="number" placeholder="请输入库存" class="form-control" name="g_num">
                                    </div>
                                    <div class="form-group">
                                        <label>父类id</label>
                                       <select name="cat_id" id="cat_id">
                                                    <option value="">请选择</option>
                                            <?php foreach($catAll as $k=>$v){?>
                                                    <option value="<?php echo $v['cat_id']?>"><?php echo $v['c_name']?></option>
                                            <?php }?>
                                       </select>

                                       <label>品牌id</label>
                                       <select name="" id="bran">
                                            <option value="0" name="brand_id">请选择</option>
                                       </select>
                                    </div>
                                 
                                    <div class="form-group">
                                        <label>商品图片上传</label>
                                        <input type="file" id="uploadify" style=""/>
                                        <input type="hidden" name="g_img">
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
<script src="/uploadify/jquery.js"></script>
<script src="/uploadify/jquery.uploadify.js"></script>
<link rel="stylesheet" href="{{asset('uploadify/uploadify.css')}}">
    <script>
     $(document).ready(function(){
        $("#uploadify").uploadify({
            // alert(111);
            'swf':"{{asset('uploadify/uploadify.swf')}}",
            'uploader':'/goods/up',
            'onUploadSuccess':function(file,msg,data){
                $("input[name='g_img']").val(msg);
                // console.log(msg);
            }
        })

    
     $("#cat_id").change(function(){
        //  alert(123);
        var _this = $(this);
        var cat_id = $("#cat_id").val();
        // alert(cat_id);
        data = {};
        data.cat_id=cat_id;
        $.ajax({
            url:'/goods/ajax',//请求地址
            type:'post',//请求的类型
            dataType:'json',//返回的类型
            data:data,//要传输的数据
            success:function(res){ //成功之后回调的方法
                // console.log(res);
                $("#bran").empty();
                $.each(res,function(k,v){
                    var tr = '<option name="brand_id" value="'+v.brand_id+'">'+v.b_name+'</option>';
                    $("#bran").append(tr);
                })
            }
        })
        

     });

     $("#btn").click(function(){
            // alert(123);
            var _this = $(this);
            var g_name = $("input[name='g_name']").val();
            var g_price = $("input[name='g_price']").val();
            var g_num = $("input[name='g_num']").val();
            var cat_id = $("#cat_id").val();
            var brand_id = $("option[name='brand_id']:selected").val();
            var g_img = $("input[name='g_img']").val();
            var g_desc = UE.getEditor('editor').getContent();
            // alert(c_name);
            data = {};
            data.g_name = g_name;
            data.g_price=g_price;
            data.g_num = g_num;
            data.cat_id=cat_id;
            data.brand_id=brand_id;
            data.g_img = g_img;
            data.g_desc = g_desc;
            $.ajax({
                url:"{{url('goods/add_do')}}",
                data:data,
                type:"post",
                success:function(res){

                }
            })
        
        })

})
        </script>

@endsection