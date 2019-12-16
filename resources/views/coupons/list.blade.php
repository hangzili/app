@extends('index.index')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>基本 <small>分类，查找</small></h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="table_data_tables.html#">选项1</a>
                    </li>
                    <li><a href="table_data_tables.html#">选项2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                <tr>
                    <th> ID</th>
                    <th>优惠卷价格</th>
                    <th>过期时间</th>
                    <th>添加时间</th>
                    <th>使用范围</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                <tr class="gradeX">
                    <td>{{$v->cou_id}}</td>
                    <td>{{$v->cou_price}} </td>
                    <td>{{$v->overdue_time}}</td>

                    <td>{{date('Y-m-d ',$v->time)}}</td>
                    <td>{{date($v->range)}}</td>
                    <td>
                        <a href="del/?cou_id={{$v->cou_id}}" class="btn btn-danger" style="color: #0b0b0b;text-decoration:none;">删除</a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
            <center>{{$data->links()}}</center>
        </div>
    </div>

@endsection