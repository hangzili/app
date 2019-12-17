@extends('index.index')
@section('content')

<div class="ibox-content">

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>商品id</td>
                <td>属性id</td>
                <td>属性值id</td>
                <td>操作</td>
            </tr>
        </thead>
    @foreach($betInfo as $k => $v)
        <tbody>
            <tr>
                <td>{{$v->b_id}}</td>
                <td>{{$v->goods_id}}</td>
                <td>{{$v->t_id}}</td>
                <td>{{$v->a_id}}</td>
                <td><button type="button" class="btn btn-danger">删除</button></td>
            </tr>
        </tbody>
    @endforeach
    </table>

</div>


@endsection