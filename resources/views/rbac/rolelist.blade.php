@extends('index.index')
@section('content')

<div class="ibox-content">

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>角色名称</td>
                <td>操作</td>
            </tr>
        </thead>
    @foreach($roleInfo as $k => $v)
        <tbody>
            <tr>
                <td>{{$v->r_id}}</td>
                <td>{{$v->r_name}}</td>
                <td><button type="button" class="btn btn-danger">删除</button>  <button type="button" class="btn btn-success">修改</button></td>
            </tr>
        </tbody>
    @endforeach
    </table>

</div>
@endsection
