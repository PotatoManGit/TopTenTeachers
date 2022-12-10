@extends("layout")

@section("content")
    <head>
        <meta charset="UTF-8">
        <title>十佳教师评选</title>
    </head>

    <div class="jumbotron" style="text-align: center">
        <h1>登录</h1>
{{--        <p>请登录</p>--}}
{{--        <p>用户名和密码为评教前分发的用户名密码，如果你没有，请咨询指导员</p>--}}
        {{--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
    </div>
    @if($cause == 2)
        <center><div class="alert alert-danger" role="alert">您没有管理员身份，无法进入管理员入口！</div></center>
    @else
    @endif
    <center><div class="col-md-offset-1 col-md-10 col-xs-12" style="margin-top: 2%">
            <form action="{{ url('user/sign_in/check') }}" method="post">
                @csrf
                <div class="input-group col-xs-4" style="margin-bottom: 1%">
                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                    <input type="text" class="form-control" name="username"
                           aria-describedby="basic-addon3" placeholder="用户名"
                           required
                           pattern="[A-Za-z0-9]{0-15}" title="用户名输入格式错误，请检查后输入">
                </div>

                <div class="input-group col-xs-4">
                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></span>
                    <input type="password" class="form-control" name="password"
                           aria-describedby="basic-addon3" placeholder="密码"
                           required
                           pattern="[A-Za-z0-9]{0-15}" title="密码输入格式错误，请检查后输入">
                </div>
{{--                <input type="text" name="username" class="formInputStyle_01"--}}
{{--                       required--}}
{{--                       pattern="[A-Za-z0-9]{7}" title="用户名输入格式错误，请检查后输入"--}}
{{--                       placeholder="用户名"/><br/><br/>--}}
{{--                <input type="password" name="password" class="formInputStyle_01"--}}
{{--                       required--}}
{{--                       pattern="[A-Za-z0-9]{7}" title="密码输入格式错误，请检查后输入"--}}
{{--                       placeholder="密码"/>--}}


                @if ($check_result == 0)
                    <div style="margin: 2%"></div>
                @elseif ($check_result == 1)
                    <br/>
                    <div class="alert alert-danger" role="alert">用户名或密码错误！</div>
                @endif

                <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
                    <button type="submit" class="btn btn-default">登录</button>
                </div>
            </form>
        </div></center>


@stop
