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

    <div>
        <form action="{{ url('user/sign_in/check') }}" method="post">
            @csrf
            <h1 style="text-align: center; color: black">最佳老师奖</h1>
            <p style="text-align: center;">请选择一位最适合这个称号的老师</p>
            <section>
                <div class="divInLine">
                    <legend>语文老师</legend>
                    <ul>
                        @foreach($data as $d)
                            @if ($d["type"] == "语文")
                                <li>
                                    <label for="title_1">
                                        <input type="radio" id="{{ $d["tid"] }}" name="choice" value="{{ $d["tid"] }}">
                                        {{ $d["name"] }}
                                    </label>
                                </li>
                            @endif
                        @endforeach()
                    </ul>
                </div>
                <div class="divInLine">
                    <legend>数学老师</legend>
                    <ul>
                        @foreach($data as $d)
                            @if ($d["type"] == "数学")
                                <li>
                                    <label for="title_1">
                                        <input type="radio" id="{{ $d["tid"] }}" name="choice" value="{{ $d["tid"] }}">
                                        {{ $d["name"] }}
                                    </label>
                                </li>
                            @endif
                        @endforeach()
                    </ul>
                </div>
                <div class="divInLine">
                    <legend>英语老师</legend>
                    <ul>
                        @foreach($data as $d)
                            @if ($d["type"] == "英语")
                                <li>
                                    <label for="title_1">
                                        <input type="radio" id="{{ $d["tid"] }}" name="choice" value="{{ $d["tid"] }}">
                                        {{ $d["name"] }}
                                    </label>
                                </li>
                            @endif
                        @endforeach()
                    </ul>
                </div>
                <div class="divInLine">
                    <legend>物理老师</legend>
                    <ul>
                        @foreach($data as $d)
                            @if ($d["type"] == "物理")
                                <li>
                                    <label for="title_1">
                                        <input type="radio" id="{{ $d["tid"] }}" name="choice" value="{{ $d["tid"] }}">
                                        {{ $d["name"] }}
                                    </label>
                                </li>
                            @endif
                        @endforeach()
                    </ul>
                </div>
                <div class="divInLine">
                    <legend>化学老师</legend>
                    <ul>
                        @foreach($data as $d)
                            @if ($d["type"] == "化学")
                                <li>
                                    <label for="title_1">
                                        <input type="radio" id="{{ $d["tid"] }}" name="choice" value="{{ $d["tid"] }}">
                                        {{ $d["name"] }}
                                    </label>
                                </li>
                            @endif
                        @endforeach()
                    </ul>
                </div>
                <div class="divInLine">
                    <legend>生物老师</legend>
                    <ul>
                        @foreach($data as $d)
                            @if ($d["type"] == "生物")
                                <li>
                                    <label for="title_1">
                                        <input type="radio" id="{{ $d["tid"] }}" name="choice" value="{{ $d["tid"] }}">
                                        {{ $d["name"] }}
                                    </label>
                                </li>
                            @endif
                        @endforeach()
                    </ul>
                </div>
                <div class="divInLine">
                    <legend>政治老师</legend>
                    <ul>
                        @foreach($data as $d)
                            @if ($d["type"] == "政治")
                                <li>
                                    <label for="title_1">
                                        <input type="radio" id="{{ $d["tid"] }}" name="choice" value="{{ $d["tid"] }}">
                                        {{ $d["name"] }}
                                    </label>
                                </li>
                            @endif
                        @endforeach()
                    </ul>
                </div>
                <div class="divInLine">
                    <legend>地理老师</legend>
                    <ul>
                        @foreach($data as $d)
                            @if ($d["type"] == "地理")
                                <li>
                                    <label for="title_1">
                                        <input type="radio" id="{{ $d["tid"] }}" name="choice" value="{{ $d["tid"] }}">
                                        {{ $d["name"] }}
                                    </label>
                                </li>
                            @endif
                        @endforeach()
                    </ul>
                </div>
                <p>
                    <label for="name">
                        <span>其他老师: </span>
                        <strong><abbr title="required">*</abbr></strong>
                    </label>
                    <input type="text" id="name" name="username">
                </p>
            </section>
            <section>
                <p> <button type="submit">提交</button> </p>
            </section>
        </form>
    </div>
</head>

@stop
