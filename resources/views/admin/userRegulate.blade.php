@extends("admin/adminLayout")

@section("content_admin")


    <div class="jumbotron" style="text-align: center">
        <h1>用户管理</h1>
        <p>生成用户用户名密码，查看用户评教情况等</p>
{{--        <p></p>--}}
        {{--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
    </div>

    <div class="col-md-6 col-xs-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">生成用户名，密码</div>
            <div class="panel-body">
                <p><b>此次操作会覆盖数据库非管理员用户数据，请谨慎操作</b></p>
            </div>
            <form>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高一最大班级数</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高一每班最大人数</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高二最大班级数</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高二每班最大人数</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高三最大班级数</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高三每班最大人数</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                    </li>
                </ul>
            </form>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>

@stop
