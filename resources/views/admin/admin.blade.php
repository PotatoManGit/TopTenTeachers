@extends("admin/adminLayout")

@section("content_admin")


    <center><h1>管理面板</h1></center>

    <div>
        <div class="panel panel-primary col-md-3">
            <div class="panel-heading">现在已完成评选人数</div>
            <div class="panel-body">
                <p>已有<b>{{ $allFinishNum }}</b>人完成评教</p>
            </div>
        </div>
        <div class="panel panel-primary col-md-5">
            <div class="panel-heading">导航</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="{{ url('/admin/control?cmd=evaluationStatus&val-1=run') }}">开始评教</a></li>
                    <li role="presentation"><a href="{{ url('/admin/control?cmd=evaluationStatus&val-1=stop') }}">停止评教</a></li>
                    <li role="presentation"><a href="{{ url('/') }}">前往普通用户网页</a></li>
                    <li role="presentation"><a href="{{ url('/admin/result_get') }}">结果查询</a></li>
                </ul>
            </div>
        </div>
    </div>
@stop
