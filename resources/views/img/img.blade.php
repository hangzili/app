@extends('index.index')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>属性添加</title>
</head>
<body>
    <div class="ibox-content">
       

            <div class="form-group">
                <label class="col-sm-3 control-label">图片名称</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="属性名称" name="img_name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3" id="tables" for="exampleInputFile">轮播图</label>
                <input type="file" id="uploadify">
                <input type="hidden"  name='img_url'>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <button class="btn btn-sm btn-info" type="button">添加</button>
                </div>
            </div>
        
    </div>
</body>
</html>
<link rel="stylesheet" type="text/css" href="/uploadify/uploadify.css" />
            <link rel="MIME" type="application/x-shockwave-flash" href="/uploadify/uploadify.swf" />
<script src="/uploadify/jq.js"></script>
<script src="/index/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="/uploadify/jquery.uploadify.js"></script>
<script>
    $("#uploadify").uploadify({
      'swf': '/uploadify/uploadify.swf',
      'uploader':'/img/up',
      'onUploadSuccess':function(file,msg,data){
        $("input[name='img_url']").val(msg);
      }
    })
    $(document).on('click','.btn',function(){
        var data = {};
        var img_name = $("input[name='img_name']").val();
        var img_url = $("input[name='img_url']").val();
        // console.log(img_name);return;
        // alert(img_url);
        data.img_name = img_name;
        data.img_url = img_url;
        $.ajax({ 
           url:"/img/doimg",
           data:data, 
           dataType:'json',
           success:function(res){ 
            // alert(res);return;
                if(res.code == 200){
                    alert(res.msg);
                    location.href="/img/imglist";
                }else{
                    alert(res.msg);
                    location.href="/img/img";
                }
           },
        }); 
    })
</script>

@endsection