@extends("layout")

@section("content")
    <div class="jumbotron" style="text-align: center">
        @if($webStatus != 1)
            <center>
                <div class="alert alert-danger" role="alert"><h1>评教还未开始，暂停或已经结束<br/>
                        <b>请联系管理员或者指导老师</b></h1></div>
            </center>
        @elseif($status == 2)
            <center>
                <div class="alert alert-danger" role="alert"><h1>您已完成评教，无需再次评教<br/>
                        <b><a href="{{ url('/public') }}">点击查看评奖实时排名</a></b></h1></div>
            </center>
        @else
            <center><h1>点击进入评教</h1></center>
                <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
                    <p><a class="btn btn-primary btn-lg" href="{{ url('user/evaluation') }}" role="button">开始</a></p>
                </div>
            <p>进入评教后请选择您认为最合适某一称号的老师</p>
        @endif
        {{--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
    </div>

@stop
