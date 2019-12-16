@extends('index.index')
@section('content')

<div class="ibox-content">

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>类型名称</td>
                <td>操作</td>
            </tr>
        </thead>
    @foreach($typeInfo as $k => $v)
        <tbody>
            <tr>
                <td>{{$v->t_id}}</td>
                <td>{{$v->t_name}}</td>
                <td><button type="button" class="btn btn-danger">删除</button>  <button type="button" class="btn btn-success">修改</button></td>
            </tr>
        </tbody>
    @endforeach
    </table>

</div>


@endsection