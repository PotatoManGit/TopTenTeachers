@extends("admin/adminLayout")

@section("content_admin")


    <center><h1>管理面板</h1></center>

    <div>
        <div class="panel panel-primary">
            <div class="panel-heading">现在已完成评选人数</div>
            <div class="panel-body">
                <p>已有<b>{{ $allFinishNum }}</b>人完成评教</p>
                @foreach( $result as $i )
                    <p>{{ $i[0] }} --- <b>{{ $i[1] }}</b></p>
                @endforeach
            </div>
        </div>
    </div>
@stop
