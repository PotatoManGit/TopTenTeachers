@extends("layout")

@section("content")

    <center><h1>点击进入评教</h1><br/><br/>
    <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
        <a href="{{ url('user/evaluation') }}"><button type="button" class="btn btn-default">开始</button></a>
    </div></center>

@stop
