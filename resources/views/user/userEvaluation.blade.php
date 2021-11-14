@extends("layout")

@section("content")
    <head>
        <meta charset="UTF-8">
        <title>十佳教师评选</title>
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

            div+div {
                margin-top: 1em;
            }

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

    <body>
    <div style="text-align: center">
        <h1>教师评选</h1>
    </div>
        <div>
            <br/>
            <br/>
            <form action="{{ url('user/sign_in/check') }}" method="post">
                @csrf
                <h1 style="text-align: center; color: black">最佳老师奖</h1>
                <p style="text-align: center;">请选择一位最适合这个称号的老师</p>
                <section>
                    <div class="divInLine">
                        <legend>语文老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>数学老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>英语老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>物理老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>化学老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>生物老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>政治老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>历史老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>地理老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>技术设计或信息技术老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>体音美老师</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="divInLine">
                        <legend>其他老师或校职工</legend>
                        <ul>
                            <li>
                                <label for="title_1">
                                    <input type="radio" id="title_1" name="title" value="A">
                                    熊艳平
                                </label>
                            </li>
                            <li>
                                <label for="title_2">
                                    <input type="radio" id="title_2" name="title" value="K" >
                                    周勇
                                </label>
                            </li>
                            <li>
                                <label for="title_3">
                                    <input type="radio" id="title_3" name="title" value="Q">
                                    王波
                                </label>
                            </li>
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
                    <p> <button type="submit">Validate the payment</button> </p>
                </section>
            </form>
        </div>
    <br/><br/><br/><br/><br/>
    </body>
@stop
