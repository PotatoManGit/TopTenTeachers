@extends("layout")

@section("content")
    <head>
        <meta charset="UTF-8">
        <title>十佳教师评选</title>
    </head>


    <div style="text-align: center">
        <h1>登录</h1>
    </div>

    <center><div class="div_body_1">
            <br/><br/><br/>
            <form action="/data/php/userControl/signIn.php" method="post">
                <input type="text" name="username" class="formInputStyle_01"
                       required
                       pattern="[A-Za-z0-9]{7}" title="用户名输入格式错误，请检查后输入"
                       placeholder="用户名"/><br/><br/>
                <input type="password" name="password" class="formInputStyle_01"
                       required
                       pattern="[A-Za-z0-9]{7}" title="密码输入格式错误，请检查后输入"
                       placeholder="密码"/>


                <br/><br/><br/>
                <div>
                    <button class="buttonStyle_01" type="submit" autofocus>登 录</button>
                </div>
            </form>
        </div></center>


@stop