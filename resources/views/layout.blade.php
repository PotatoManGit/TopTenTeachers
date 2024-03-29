<!DOCTYPE html>


<!--
____..--'.-./`)  ____     __   ___    _           .---.       ____    _______
|        |\ .-.') \   \   /  /.'   |  | |          | ,_|     .'  __ `.\  ____  \
|   .-'  '/ `-' \  \  _. /  ' |   .'  | |        ,-./  )    /   '  \  \ |    \ |
|.-'.'   / `-'`"`   _( )_ .'  .'  '_  | |        \  '_ '`)  |___|  /  | |____/ /
/   _/  .---.___(_ o _)'   '   ( \.-.|         > (_)  )     _.-`   |   _ _ '.
.'._( )_  |   |   |(_,_)'    ' (`. _` /|        (  .  .-'  .'   _    |  ( ' )  \
.'  (_'o._) |   |   `-'  /     | (_ (_) _)         `-'`-'|___|  _( )_  | (_{;}_) |
|    (_,_)| |   |\      /       \ /  . \ /          |        \ (_ o _) /  (_,_)  /
|_________| '---' `-..-'         ``-'`-''           `--------`'.(_,_).'/_______.'
-->












































































<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://www-potatost-user.oss-cn-hangzhou.aliyuncs.com/TopTenTeachers/logo.png">
    <title>交大附中十佳教师评选</title>

    <style type="text/css" >
        .Bg {
            background-image:
                url("https://cdn.jsdelivr.net/gh/PotatoManGit/ImgLib@1.0.1/School/sjjs/bg.webp");
            background-attachment:fixed;
            background-repeat:no-repeat;
            background-size:cover;
            -moz-background-size:cover;
            -webkit-background-size:cover;
        }
        .page_center {
            /*background-color: rgb(242, 224, 255);*/
            border-radius: 40px;
        }
    </style>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <script stc="{{ @public_path('assets/js/reCheck.js') }}">
    <![endif]-->
</head>
<body class="Bg">

<div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">交大附中十佳教师评选系统</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
{{--                    <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>--}}
                    <li><a href="/">首页</a></li>
                    <li><a href="{{ url('user/') }}">评选者入口</a></li>
                    <li><a href="{{ url('admin/') }}">管理者入口</a></li>
{{--                    <li><a href="{{ url('public/') }}">评选结果公布</a></li>--}}
{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#">Action</a></li>--}}
{{--                            <li><a href="#">Another action</a></li>--}}
{{--                            <li><a href="#">Something else here</a></li>--}}
{{--                            <li role="separator" class="divider"></li>--}}
{{--                            <li><a href="#">Separated link</a></li>--}}
{{--                            <li role="separator" class="divider"></li>--}}
{{--                            <li><a href="#">One more separated link</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
{{--                <form class="navbar-form navbar-left">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" class="form-control" placeholder="Search">--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-default">Submit</button>--}}
{{--                </form>--}}
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('user/sign_in') }}">登录</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">使用文档</a></li>
                            <li><a href="#">关于评选系统</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">联系作者</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<div class="container page_center">
    @yield('content')
</div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
{{--<footer class="footer navbar-fixed-bottom ">--}}
{{--    <div class="container">--}}
{{--        <div class="panel panel-default">--}}
{{--            <div class="panel-body">--}}
{{--                Made By 子雨工作室 PotatoMan--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}


<script src="{{ @url('assets/js/jquery-3.6.1.min.js') }}" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>
