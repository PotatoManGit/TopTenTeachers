@extends("layout")

@section("content")
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
        <center><h1>点击进入评教</h1><br/><br/>
        <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
            <a href="{{ url('user/evaluation') }}"><button type="button" class="btn btn-default">开始</button></a>
        </div></center>
    @endif
@stop
