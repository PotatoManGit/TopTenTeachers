@extends("admin/adminLayout")

@section("content_admin")

    <div class="jumbotron" style="text-align: center">
        <h1>数据查询</h1>
        <p>在此处实时查询此次评教的数据</p>
        <p>默认显示所有数据，如果要进行筛选，请在下方筛选栏中进行相关操作</p>
{{--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
    </div>

    <div class="panel panel-default">
        <form class="form-inline" method="post" action="{{ url('admin/result_view/check') }}">
            @csrf
            <div class="panel-body container-fluid">
                <div class="col-md-1 clearfix">
                    <h4>筛选:</h4>
                </div>
                <div class="btn-group col-md-2 clearfix form-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        请选择输出的奖项 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <center>
                            <li>
                                <label for="-1">
                                    <h4>全部</h4>
                                </label>
                                <input id="-1" name="award[]" type="checkbox" value="-1" style="zoom: 120%">
                            </li>
                        </center>
                        @for($i = 1; $i <= config('sjjs_awardSetting.awardNum'); $i++)
                            <center>
                                <li>
                                    <label for="{{ $i }}">
                                        <h4>{{ config(('sjjs_awardSetting.award'.$i)) }}</h4>
                                    </label>
                                    <input id="{{ $i }}" name="award[]" type="checkbox" value="{{ $i }}" style="zoom: 120%">
                                </li>
                            </center>
                        @endfor
                    </ul>
                </div>
                <div class="col-md-7 clearfix form-group">

                    <label for="num">
                        <h4>输入需要输出结果的前多少名（默认输出全部）</h4>
                    </label>
                    <input id="num" type="text" name="num" class="form-control" placeholder="请输入数据">
                </div>
                <div class="co-md-2 form-group">
                    <button type="submit" class="btn btn-primary">查询</button>
                </div>
            </div>
        </form>
    </div>

    @if($type == 1)
        <center><div class="row">
            @if(empty($data))
                <div class="alert alert-wrong" role="alert"><h3><b>暂无数据</b><br/>如的确产生了数据，请联系管理员</h3></div>
            @else
                @foreach($data as $key => $val)
                    <div class="col-md-3 col-xs-12 clearfix"><div class="panel panel-primary">
                            <div class="panel-heading"><h4><b>{{ config('sjjs_awardSetting.award'.$need[$key]) }}</b></h4></div>
                            <div class="panel-body">
                                @if($num > 0)
                                    <p>以下是关于称号<b>{{ config('sjjs_awardSetting.award'.$need[$key]) }}</b>的前<b>{{ $num }}</b>名</p>
                                @else
                                    <p>以下是关于称号<b>{{ config('sjjs_awardSetting.award'.$need[$key]) }}</b>的全部数据</p>
                                @endif
                            </div>

                            <table class="table hover">
                                <tr style="text-align: center">
                                    <th>序号</th>
                                    <th>排名</th>
                                    <th>姓名</th>
                                    <th>总票</th>
                                </tr>
                                @foreach($val as $key => $i)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{ $i[0]['ranking'] }}</td>
                                        <td>{{ $i[0]['name'] }}</td>
                                        <td>{{ $i[0]['vote'] }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                @endforeach
            @endif

        </div></center>
    @elseif($type == 0)
        <div style="text-align: center" class="alert alert-success" role="alert"><h3>请在上方选择数据展示的方式</h3></div>
    @else
        <div style="text-align: center" class="alert alert-danger" role="alert"><h3>请在上方选择输出的奖项</h3></div>
    @endif
    <br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/>
@stop
