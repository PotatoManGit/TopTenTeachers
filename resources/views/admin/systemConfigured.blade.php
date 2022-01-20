@extends("layout")

@section("content")
    <head>
        <meta charset="UTF-8">
        <title>十佳教师评选</title>
    </head>
    <div style="text-align: center">
        <div class="jumbotron">
            <h1>交大附中十佳教师评选</h1>
            <p>在新部署网站或修改网站配置后，需要重新配置网站</p>
            <p><b>请务必确认配置文件编写符合配置规则，网站服务器符合文档上的各种要求</b></p>
            <p><a class="btn btn-primary btn-lg" target="_blank" href="http://sjjs.doc.ziyustudio.com/" role="button">查看使用说明</a></p>
            <center><h1>点击开始配置</h1></center>
            <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
                <p><a class="btn btn-primary btn-lg" href="{{ url('admin/config?status=1') }}" role="button">开始配置</a></p>
            </div>
        </div>
    </div>


@stop
