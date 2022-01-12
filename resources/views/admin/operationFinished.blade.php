@extends("admin/adminLayout")

@section("content_admin")


    <div>
        @if($result == 1)
            <div class="alert alert-success" role="alert"><center><h1>操作成功<br/>
                    <b><a href="{{ url()->previous().'?do=1' }}">点击返回</a></b></h1></center></div>
        @else
            <div class="alert alert-danger" role="alert"><center><h1>语法错误或操作失败<br/>
                    <b><a href="{{ url('/about/help') }}">点击获取帮助</a></b></h1><center></div>
        @endif
    </div>
@stop
