@extends("admin/adminLayout")

@section("content_admin")
    <head>
        <meta charset="UTF-8">
        <title>评教记录查询</title>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/paging.css')}}" rel="external nofollow" />
    </head>

    <div class="jumbotron" style="text-align: center">
        <h1>评教记录查询</h1>
        <p>查看，删除评教记录</p>
        <p>评教记录详细记录了某个用户评选的老师，评教时间等信息</p>
        <p>想要删除所有数据，请转到<a href="{{ url('admin/result_view') }}">数据查询</a></p>
        <p><a class="btn btn-primary btn-lg" target="_blank" href="http://sjjs.doc.ziyustudio.com/2626185" role="button">查看使用说明</a></p>
        {{--        <p></p>--}}
        {{--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
    </div>
    <div class="col-md-12 col-xs-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading" id="userList">评教记录</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>uid</th>
                        <th>用户名</th>
                        <th>完成评教时间</th>
                        @for($i = 1; $i <= config('sjjs_awardSetting.awardNum'); $i++)
                            <th>{{ config('sjjs_awardSetting.award'.$i) }}</th>
                        @endfor
                        <th>操作</th>
                    </tr>
                    @foreach($data as $key=>$val)
                        <tr>
                            <td>{{ $key+1+($page-1)*10 }}</td>
                            <td>{{ $val->id }}</td>
                            <td>{{ $val->uid }}</td>
                            <td>{{ $dbu->GetUsernameByUid($val->uid) }}</td>
                            <td>{{ $val->upload_at }}</td>
                            @for($i = 1; $i <= config('sjjs_awardSetting.awardNum'); $i++)
                                <td>{{ $dbt->GetNameByTid($val['award'.$i]) }}</td>
                            @endfor

                            <td><a href="{{ url('admin/control?cmd=delEvaluationDataById&val-1='.$val->id) }}">删除</a></td>
                        </tr>
                    @endforeach
                </table>
                <center>{{ $data->render() }}</center>
            </div>
        </div>
    </div>


@stop
