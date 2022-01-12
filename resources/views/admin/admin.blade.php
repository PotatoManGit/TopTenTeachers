@extends("admin/adminLayout")

@section("content_admin")


    <div class="jumbotron" style="text-align: center">
        <h1>管理面板</h1>
        <p>欢迎使用交大附中十佳教师评选系统的管理后台</p>
        <p>请慎重操作，某些操作可能会改变数据或网站相关设置</p>
        {{--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
    </div>

    <div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">现在评教状态</div>
                @if($evaluationStatus == 1)
                <div class="panel-body">
                    <p>已有<b>{{ $allFinishNum }}</b>人完成评教</p>
                    <p>评教持续了<b>{{ $evaluationContinueTime }}</b></p>
                </div>
                @else
                    <div class="panel-body">
                        <p><b>评教尚未开始</b></p>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">快捷操作</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="{{ url('/admin/control?cmd=evaluationStatus&val-1=run') }}">开始评教</a></li>
                        <li role="presentation"><a href="{{ url('/admin/control?cmd=evaluationStatus&val-1=stop') }}">停止评教</a></li>
                        <li role="presentation"><a href="{{ url('/') }}">前往普通用户网页</a></li>
                        <li role="presentation"><a href="{{ url('/admin/result_view') }}">结果查询</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/><br/><br/>
@stop
