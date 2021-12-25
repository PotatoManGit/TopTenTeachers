@extends("admin/adminLayout")

@section("content_admin")


    <div class="jumbotron" style="text-align: center">
        <h1>用户管理</h1>
        <p>生成用户用户名密码，设置，删除管理员</p>
        <p>用户列表中的用户名密码是唯一的，把它们分发给每个用户以登录评教</p>
{{--        <p></p>--}}
        {{--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
    </div>

    <div class="col-md-6 col-xs-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">生成用户名，密码</div>
            <div class="panel-body">
                <h3><b>此次操作会覆盖数据库非管理员用户数据，请谨慎操作</b></h3>
            </div>
            <form method="post" action="{{ url('admin/user_regulate/new_evaluation_user') }}">
                @csrf
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高一最大班级数</label>
                            <input type="number" name="g1" class="form-control" min="0" max="999"
                                   required pattern="[0-9]{3}" title="填写值不得超过三位" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高一每班最大人数</label>
                            <input type="number" name="c1" class="form-control" min="0" max="999"
                                   required pattern="[0-9]{3}" title="填写值不得超过三位" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高二最大班级数</label>
                            <input type="number" name="g2" class="form-control" min="0" max="999"
                                   required pattern="[0-9]{3}" title="填写值不得超过三位" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高二每班最大人数</label>
                            <input type="number" name="c2" class="form-control" min="0" max="999"
                                   required pattern="[0-9]{3}" title="填写值不得超过三位" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高三最大班级数</label>
                            <input type="number" name="g3" class="form-control" min="0" max="999"
                                   required pattern="[0-9]{3}" title="填写值不得超过三位" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">高三每班最大人数</label>
                            <input type="number" name="c3" class="form-control" min="0" max="999"
                                   required pattern="[0-9]{3}" title="填写值不得超过三位" placeholder="请填写数字">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
                            <button type="submit" class="btn btn-primary">生成并提交数据库</button>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">管理用户</div>
            <div class="panel-body">
                <h3>添加管理员；下载用户名密码列表</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <h4>用户用户名密码列表下载</h4>
                </li>
                <li class="list-group-item">
                    <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
                        <a href="{{ url('admin/user_regulate?export=1') }}">
                            <button type="submit" class="btn btn-default">下载高一用户列表</button></a>
                        <a href="{{ url('admin/user_regulate?export=2') }}">
                            <button type="submit" class="btn btn-default">下载高二用户列表</button></a>
                        <a href="{{ url('admin/user_regulate?export=3') }}">
                            <button type="submit" class="btn btn-default">下载高三用户列表</button></a>
                    </div>
                </li>
                <li class="list-group-item">

                </li>
                <li class="list-group-item">
                    <h4>管理员列表</h4>
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>用户名</th>
                            <th>操作</th>
                        </tr>
                        @foreach($adminData as $key=>$val)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $val->username }}</td>
                                <td><a href="{{ url('admin/control?cmd=del_admin&val-1='.$val->uid) }}">删除</a></td>
                            </tr>
                        @endforeach
                    </table>
                </li>
                <li class="list-group-item">
                    <h4>添加管理员或修改指定用户名用户的密码</h4>
                </li>
                <form method="post" action="{{ url('admin/user_regulate/add_admin') }}">
                    @csrf
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">填写用户名</label>
                            <input type="text" name="admin_username" class="form-control"
                                   required title="15位以内" placeholder="请输入15位以内用户名">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">填写密码</label>
                            <input type="password" name="admin_password" class="form-control"
                                   required title="15位以内" placeholder="请输入15位以内密码">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
                            <button type="submit" class="btn btn-primary">添加或修改</button>
                        </div>
                    </li>
                </form>
            </ul>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>

@stop
