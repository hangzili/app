@extends('index.index')

@section('content')
<style type="text/css">
.table{
    margin:0 auto;width:1000p
    border:1px solid #ccc;
    border-collapse:collapse;
    width:80%;
}
.table th, .table td{
  border:1px solid #ccc;
  padding:10px;
  text-align:center;
}
.submit {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
</style>

<table cellpadding="2" cellspacing="1" class="table">
    <tr>
        <td>id</td>
        <td>分类名</td>
        <td>品牌名</td>
        <td>添加时间</td>
        <td>编辑</td>
    </tr>
<?php foreach($list as $k=>$v){ ?>
    <tr>
        <td><?php echo $v['brand_id']?></td>
        <td><?php echo $v['c_name']?></td>
        <td><?php echo $v['b_name']?></td>
        <td><?php echo $v['create_time']?></td>
        <td><input type="submit" name="del" value="删除" class="submit" id="<?php echo $v['brand_id']?>" javascript:0; /></td>
    </tr>
<?php }?>
</table>
@endsection
<script src="/uploadify/jquery.js"></script>
<script>
    $(document).ready(function(){
        $(".submit").click(function(){
            // alert(111);
            var _this = $(this);
            var id = _this.attr("id");
            // alert(cat_id);
            $.ajax({
                type:"post",
                data:{id:id},
                dataType:'json',
                url:'/brand/del',
                success:function(res){
                    if(res == 1){
                        _this.parents('tr').hide();
                        alert("删除成功");
                    }else{
                        alert("删除成功");  
                    }
                }
            })
        })
    })

</script>