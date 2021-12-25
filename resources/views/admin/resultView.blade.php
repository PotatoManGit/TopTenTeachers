@extends("admin/adminLayout")

@section("content_admin")

    <div class="jumbotron" style="text-align: center">
        <h1>数据查询和导出</h1>
        <p>在此处实时查询此次评教的数据</p>
        <p>默认显示所有数据，如果要进行筛选,导出格式为excel，请在下方筛选栏中进行相关操作</p>
        <p><b>进行筛选后，请务必先点击查询，查询成功后再点击导出</b></p>
{{--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>--}}
    </div>

    <div class="panel panel-default ">
        <form class="form-inline" method="post" action="{{ url('admin/result_view/check') }}">
            @csrf
            <div class="panel-body container-fluid ">
                <div class="btn-group col-md-2 clearfix form-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        请选择输出的奖项 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <center>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input name="award[]" value="-1" type="checkbox">
                                        全部
                                    </label>
                                </div>
                            </li>
                        </center>
                        @for($i = 1; $i <= config('sjjs_awardSetting.awardNum'); $i++)
                            <center>
                                <li>
                                    <div class="checkbox">
                                        <label for="{{ $i }}">
                                            <input name="award[]" type="checkbox" value="{{ $i }}">
                                            {{ config(('sjjs_awardSetting.award'.$i)) }}
                                        </label>
                                    </div>

                                </li>
                            </center>
                        @endfor
                    </ul>
                </div>
                <div class="col-md-7 clearfix form-group">

                    <label for="num">
                        <h4>输入需要输出结果的前多少名(默认输出全部)</h4>
                    </label>
                    <input id="num" type="text" name="num" class="form-control" placeholder="请输入数据">
                </div>
                <div class="co-md-1 form-group">
                    <button type="submit" class="btn btn-primary">查询</button>
                </div>
                @if($type == 1)
                <div class="co-md-1 form-group">
                    <a href="{{ url('admin/result_view?award='.$needStr.'&num='.$num.'&export=download') }}">
                        <button type="button" class="btn btn-primary">导出当前</button>
                    </a>
                </div>
                @else
                @endif
                <div class="co-md-1 form-group">
                    <a href="{{ url('admin/result_view?del=1') }}">
                        <button type="button" class="btn btn-primary">删除所有数据</button>
                    </a>
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
                    @if($max+1 == 1)
                        <div class="col-md-12 col-xs-12 clearfix"><div class="panel panel-primary">
                    @elseif($max+1 == 2)
                        <div class="col-md-6 col-xs-12 clearfix"><div class="panel panel-primary">
                    @elseif($max+1 == 3)
                        <div class="col-md-4 col-xs-12 clearfix"><div class="panel panel-primary">
                    @else
                        <div class="col-md-3 col-xs-12 clearfix"><div class="panel panel-primary">
                    @endif

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
                                    <th>#</th>
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
