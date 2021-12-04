@extends("layout")

@section("content")

{{--    <center><h1>点击进入评教</h1><br/><br/>--}}
{{--        <div class="btn-group" style="text-align: center;" role="group" aria-label="...">--}}
{{--            <a href="{{ url('user/evaluation') }}"><button type="button" class="btn btn-default">开始</button></a>--}}
{{--        </div></center>--}}
<div>
    <h1 style="text-align: center">请确认选择</h1>
    @for($i = 1; $i <= $awardNum; $i++)
        @if($awardData[$i-1] == null)
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">您<b>还未</b>选择能够获得<b>
                            "{{ config('sjjs_awardSetting.award'.$i) }}"</b>称号的老师</h3>
                </div>
                <div class="panel-body">
                    <a href="{{ url('/user/evaluation?award='.($i + 1)) }}">点击此处去选择</a>
                </div>
            </div>
        @else
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">您认为能够获得<b>"{{ config('sjjs_awardSetting.award'.$i) }}"</b>称号的老师是：</h3>
                </div>
                <div class="panel-body">
                    <b>{{ $awardData[$i-1] }}</b>老师
                    <a href="{{ url('/user/evaluation?award='.($i + 1)) }}>点击此处重新选择</a>
                </div>
            </div>
        @endif
    @endfor
</div>

@stop
