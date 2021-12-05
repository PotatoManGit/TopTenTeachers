@extends("layout")

@section("content")
    <div>
        @if($result == 1)
            <div class="alert alert-success" role="alert"><h1>成功完成评教
                    <b><a href="{{ url('/') }}">点击回到首页</a></b></h1></div>
        @else
            <div class="alert alert-danger" role="alert"><h1>数据提交失败
                    <b><a href="{{ url('/about/help') }}">点击获取帮助</a></b></h1></div>
        @endif
    </div>
@stop
