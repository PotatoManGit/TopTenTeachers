@extends("layout")

@section("content")

<head>
    <style type="text/css">
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        /*form {*/
        /*    margin: 0 auto;*/
        /*    width: 80%;*/
        /*    padding: 1em;*/
        /*    border: 1px solid #CCC;*/
        /*    border-radius: 1em;*/
        /*    background: rgba(255,255,255,0.42);*/
        /*}*/
        /*div+div {*/
        /*    margin-top: 1em;*/
        /*}*/
        /*label span {*/
        /*    display: inline-block;*/
        /*    width: 120px;*/
        /*    text-align: right;*/
        /*}*/
        /*input, textarea {*/
        /*    font: 1em sans-serif;*/
        /*    width: 250px;*/
        /*    box-sizing: border-box;*/
        /*    border: 1px solid #999;*/
        /*}*/
        input[type=checkbox], input[type=radio] {
            width: auto;
            border: none;
        }
        /*input:focus, textarea:focus {*/
        /*    border-color: #000;*/
        /*}*/
        textarea {
            vertical-align: top;
            height: 5em;
            resize: vertical;
        }
        fieldset {
            width: 250px;
            box-sizing: border-box;
            margin-left: 136px;
            border: 1px solid #999;
        }
        button {
            margin: 20px 0 0 124px;
        }
        label {
            position: relative;
        }
        label em {
            position: absolute;
            right: 5px;
            top: 20px;
        }
        .divInLine {
            display:inline-block;
        }
        /*a {*/
        /*    text-decoration:none;*/
        /*    color: white;*/
        /*}*/
    </style>
</head>


        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 style="text-align: center;">请选择一位最适合<b>{{ $awardName }}</b>称号的老师</h3></div>
                <div class="panel-body">
                    @if($status >= 0)
                        <form action="{{ url('user/evaluation/?award='.($awardId + 1)) }}" method="post">
                    @else
                        <form action="{{ url('user/evaluation/?award='.($awardId).'&status=re_check') }}" method="post">
                    @endif
                        @csrf
                            <div class="panel panel-default">
                                <input name="awardId" hidden value="{{ $awardId }}">
                                <section>
                                    @for($i = 1; $i <= config('sjjs_teacherSetting.teacherTypeNum'); $i++)
                                        <div class="divInLine">
                                            <legend>{{ config('sjjs_teacherSetting.teacherType'.$i)['typeName'] }}</legend>
                                            <ul class="list-group">
                                                @foreach($data as $d)
                                                    @if (in_array($d['type'], config('sjjs_teacherSetting.teacherType'.$i)['typeKey']))
                                                        <li class="list-group-item">
                                                            @if(($status == 2 || $status == -2) && $teacherChose != '0' && $d["tid"] == $tid)
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" id="{{ $d["tid"] }}" checked
                                                                               name="choice" value="{{ $d["tid"] }}">
                                                                        {{ $d["name"] }}
                                                                    </label>
                                                                <div class="radio">
                                                            @else
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" id="{{ $d["tid"] }}"
                                                                               name="choice" value="{{ $d["tid"] }}">
                                                                        {{ $d["name"] }}
                                                                    </label>
                                                                </div>
                                                            @endif
                                                        </li>
                                                    @endif
                                                @endforeach()
                                            </ul>
                                        </div>
                                    @endfor
                                </section>
                                @if ($status == 0)
                                    <div style="margin: 2%"></div>
                                @elseif (($status == 1 || $status == -1) && $status != 'op')
                                    <br/>
                                    <div class="alert alert-danger" style="text-align: center" role="alert">请选择一个选项！</div>
                                @elseif ($status == 2 || $status == -2)
                                    @if($teacherChose != '0')
                                        <div class="alert alert-info" style="text-align: center" role="alert">之前选择的是<strong>
                                                {{ $teacherChose }}</strong>老师，重新选择可改选</div>
                                    @else
                                        {{ $status }}
                                    @endif
                                @endif
                                <center>
                                    <div class="btn-group" role="group" aria-label="...">
{{--                                        <button type="button" class="btn btn-default">Left</button>--}}
{{--                                        <button type="button" class="btn btn-default">Middle</button>--}}
{{--                                        <button type="button" class="btn btn-default">Right</button>--}}
                                        @if($awardId > 1 && $status >= 0)

                                                <button onclick="window.location.href='{{ url('user/evaluation/?award='.($awardId - 1)) }}'" type="button" class="btn btn-primary">上一个</button>
                                        @else
                                        @endif

                                        @if($awardId != config('sjjs_awardSetting.awardNum') && $status >= 0)
                                            <button type="submit" class="btn btn-primary">下一个</button>
                                        @else
                                            <button type="submit" class="btn btn-primary">提交</button>
                                        @endif
                                    </div>
                                </center>

                            </div>
                    </form>
                </div>
            </div>
        </div>

@stop
