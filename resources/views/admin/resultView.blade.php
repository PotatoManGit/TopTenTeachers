@extends("admin/adminLayout")

@section("content_admin")


    <center><h1>数据查询</h1></center>

{{--    <div>--}}
{{--        <div class="panel panel-primary">--}}
{{--            <!-- Default panel contents -->--}}
{{--            <div class="panel-heading">Panel heading</div>--}}
{{--            <div class="panel-body">--}}
{{--                <p>...</p>--}}
{{--            </div>--}}

{{--            <!-- Table -->--}}
{{--            <table class="table hover">--}}
{{--                ...--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}

    <table class="table">
        <tr>
            <th>id</th>
            <th>时间</th>
            <th>数量</th>
{{--            <th>售卖情况</th>--}}
        </tr>
        @foreach($data as $val)
            <tr class="alter">
                <td>{{ $val->links(["ranking"]) }}</td>
                <td>{{ $val->links(['name'])}}</td>
                <td>{{ $val->links(["vote"]) }}</td>
{{--                <td class="td_css">--}}
{{--                    @if($val["status"] == 1)--}}
{{--                        成功--}}
{{--                    @else--}}
{{--                        失败--}}
{{--                    @endif--}}
{{--                </td>--}}
            </tr>
        @endforeach()
    </table>

    {{ $data->links() }}
@stop
