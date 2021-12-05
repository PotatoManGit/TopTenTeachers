@extends("layout")

@section("content")

<head>
    <style type="text/css">
        h1 {
            margin-top: 0;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        form {
            margin: 0 auto;
            width: 80%;
            padding: 1em;
            border: 1px solid #CCC;
            border-radius: 1em;
            background: rgba(255,255,255,0.42);
        }
        /*div+div {*/
        /*    margin-top: 1em;*/
        /*}*/
        label span {
            display: inline-block;
            width: 120px;
            text-align: right;
        }
        input, textarea {
            font: 1em sans-serif;
            width: 250px;
            box-sizing: border-box;
            border: 1px solid #999;
        }
        input[type=checkbox], input[type=radio] {
            width: auto;
            border: none;
        }
        input:focus, textarea:focus {
            border-color: #000;
        }
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
    </style>
</head>

    <div>
        @if($status >= 0)
            <form action="{{ url('user/evaluation/?award='.($awardId + 1)) }}" method="post">
        @else
            <form action="{{ url('user/evaluation/?award='.($awardId).'&status=re_check') }}" method="post">
        @endif
            @csrf
            <h1 style="text-align: center; color: black">{{ $awardName }}</h1>
            <p style="text-align: center;">请选择一位最适合这个称号的老师</p>
            <input name="awardId" hidden value="{{ $awardId }}">
            <section>
                @for($i = 1; $i <= config('sjjs_teacherSetting.teacherTypeNum'); $i++)
                    <div class="divInLine">
                        <legend>{{ config('sjjs_teacherSetting.teacherType'.$i)['typeName'] }}</legend>
                        <ul>
                            @foreach($data as $d)
                                @if (in_array($d['type'], config('sjjs_teacherSetting.teacherType'.$i)['typeKey']))
                                    <li>
                                        @if(($status == 2 || $status == -2) && $teacherChose != '0' && $d["tid"] == $tid)
                                            <label for="title_1">
                                                <input type="radio" id="{{ $d["tid"] }}" checked
                                                       name="choice" value="{{ $d["tid"] }}">
                                                {{ $d["name"] }}
                                            </label>
                                        @else
                                            <label for="title_1">
                                                <input type="radio" id="{{ $d["tid"] }}"
                                                       name="choice" value="{{ $d["tid"] }}">
                                                {{ $d["name"] }}
                                            </label>
                                        @endif
                                    </li>
                                @endif
                            @endforeach()
                        </ul>
                    </div>
                @endfor
            </section>
            <div class="btn-group" role="group" aria-label="...">
                @if ($status == 0)
                    <div style="margin: 2%"></div>
                @elseif (($status == 1 || $status == -1) && $status != 'op')
                    <br/>
                    <div class="alert alert-danger" role="alert">请选择一个选项！</div>
                @elseif ($status == 2 || $status == -2)
                    @if($teacherChose != '0')
                        <div class="alert alert-info" role="alert">之前选择的是<strong>
                                {{ $teacherChose }}</strong>老师，重新选择可改选</div>
                    @else
                        {{ $status }}
                    @endif
                @endif

                @if($awardId > 1 && $status >= 0)
                    <section>
                        <a href="{{ url('user/evaluation/?award='.($awardId - 1)) }}">
                            <p><button type="button" class="btn btn-default">上一个</button></p></a>
                    </section>
                @else
                @endif

                @if($awardId != config('sjjs_awardSetting.awardNum') && $status >= 0)
                    <section>
                        <p> <button type="submit" class="btn btn-default">下一个</button> </p>
                    </section>
                @else
                    <section>
                        <p> <button type="submit" class="btn btn-default">提交</button> </p>
                    </section>
                @endif
            </div>
        </form>
    </div>

@stop
