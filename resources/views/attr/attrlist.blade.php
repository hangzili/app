@extends('index.index')
@section('content')

<div class="ibox-content">

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>属性名称</td>
                <td>属性类型</td>
                <td>操作</td>
            </tr>
        </thead>
    @foreach($attrInfo as $k => $v)
        <tbody>
            <tr>
                <td>{{$v->a_id}}</td>
                <td>{{$v->a_name}}</td>
                <td>{{$v->t_id}}</td>
                <td><button type="button" class="btn btn-danger">删除</button>  <button type="button" class="btn btn-success">修改</button></td>
            </tr>
        </tbody>
    @endforeach
    </table>

</div>


@endsection