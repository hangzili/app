@extends('index.index')
@section('content')

<div class="ibox-content">

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>角色ID</td>
                <td>权限ID</td>
                <td>操作</td>
            </tr>
        </thead>
    @foreach($RPInfo as $k => $v)
        <tbody>
            <tr>
                <td>{{$v->r_p_id}}</td>
                <td>{{$v->r_name}}</td>
                <td>{{$v->p_url}}</td>
                <td><button type="button" class="btn btn-danger">删除</button>  <button type="button" class="btn btn-success">修改</button></td>
            </tr>
        </tbody>
    @endforeach
    </table>

</div>


@endsection