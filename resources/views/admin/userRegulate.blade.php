@extends("admin/adminLayout")

@section("content_admin")
    <head>
        <meta charset="UTF-8">
        <title>用户管理</title>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/paging.css')}}" rel="external nofollow" />
    </head>

    <div class="jumbotron" style="text-align: center">
        <h1>用户管理</h1>
        <p>生成用户用户名密码，设置，删除管理员</p>
        <p>用户列表中的用户名密码是唯一的，把它们分发给每个用户以登录评教</p>
{{--        <p></p>--}}
        {{--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
    </div>
    <div class="col-md-12 col-xs-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading" id="userList">用户列表</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>用户名</th>
                        <th>密码</th>
                        <th>权限</th>
                        <th>上次登录时间</th>
                        <th>是否完成评教</th>
                        <th>完成评教时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $key=>$val)
                        <tr>
                            <td>{{ $key+1+($page-1)*10 }}</td>
                            <td>{{ $val->username }}</td>
                            <td><a href="javascript:alert('该用户的密码是：{{ $val->password }}')">查看密码</a></td>
                            <td>
                                @if($val->type == config('sjjs_userSystem.admin_user_type'))
                                    管理员
                                @else
                                    普通用户
                                @endif
                            </td>
                            <td>
                                @if($val->last_sign_in === null)
                                    他从来没登录
                                @else
                                    {{ date('Y-m-d H:i:s', $val->last_sign_in) }}
                                @endif
                            </td>
                            <td>
                                @if($val->status != 2)
                                    没有完成
                                @else
                                    <b>完成评教</b>
                                @endif
                            </td>
                            <td>
                                @if($val->finish_time === null)
                                    他没有完成评教
                                @else
                                    {{ date('Y-m-d H:i:s', $val->finish_time) }}
                                @endif
                            </td>
                            <td><a href="{{ url('admin/control?cmd=del_user&val-1='.$val->uid) }}">删除</a></td>
                        </tr>
                    @endforeach
                </table>
                <center>{{ $data->render() }}</center>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">生成用户名，密码</div>
            <div class="panel-body">
                <h3><b>此次操作会覆盖数据库非管理员用户数据，请谨慎操作</b><a href="http://sjjs.doc.ziyustudio.com/2604617">[说明文档]</a></h3>
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

    </div>
    <div class="col-md-6 col-xs-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">管理用户</div>
            <div class="panel-body">
                <h3>管理用户；下载用户名密码列表</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
                        <a href="{{ url('admin/user_regulate?export=1') }}">
                            <button type="submit" class="btn btn-primary">下载高一用户列表</button></a>
                        <a href="{{ url('admin/user_regulate?export=2') }}">
                            <button type="submit" class="btn btn-primary">下载高二用户列表</button></a>
                        <a href="{{ url('admin/user_regulate?export=3') }}">
                            <button type="submit" class="btn btn-primary">下载高三用户列表</button></a>
                        <a href="http://sjjs.doc.ziyustudio.com/2604617" style="font-size: 17px">[说明文档]</a>
                    </div>
                </li>
                <li class="list-group-item">
                    <h4>管理员列表</h4>
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>用户名</th>
                            <th>密码</th>
                            <th>操作</th>
                        </tr>
                        @foreach($adminData as $key=>$val)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $val->username }}</td>
                                <td><a href="javascript:alert('该用户的密码是：{{ $val->password }}')">查看密码</a></td>
                                <td><a href="{{ url('admin/control?cmd=del_user&val-1='.$val->uid) }}">删除</a></td>
                            </tr>
                        @endforeach
                    </table>
                </li>
                <li class="list-group-item">
                    <h4>输入已存在或不存在用户名，修改或新建用户 <a href="http://sjjs.doc.ziyustudio.com/2604617">[说明文档]</a></h4>
                </li>
                <form method="post" action="{{ url('admin/user_regulate/add_admin') }}">
                    @csrf
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">填写用户名</label>
                            <input type="text" name="username" class="form-control"
                                   required title="15位以内" placeholder="请输入15位以内用户名">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputEmail1">填写密码或修改后的新密码</label>
                            <input type="password" name="password" class="form-control"
                                   required title="15位以内" placeholder="请输入15位以内密码">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="admin" value="1">
                                设置为管理员
                            </label>
                            <label>
                                <input type="checkbox" name="dodo" value="1">
                                该操作修改已有用户信息
                            </label>
                        </div>
                        <div class="btn-group" style="text-align: center;" role="group" aria-label="...">
                            <button type="submit" class="btn btn-primary">添加或修改</button>
                        </div>
                    </li>
                </form>
            </ul>
        </div>

    </div>

@stop
