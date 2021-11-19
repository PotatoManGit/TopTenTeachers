@extends("layout")

@section("content")

    <div style="text-align: center">
{{--            <h3>{{ $teacherType }}</h3>--}}
{{--            <div class="radio">--}}
{{--                <label>--}}
{{--                    <input type="radio" name="{{ $tid }}">--}}
{{--                    {{ $teacherName }}--}}
{{--                    <br/>--}}
{{--                    <input type="radio" name="{{ $tid }}">--}}
{{--                    Option two can be something else and selecting it will deselect option one--}}
{{--                </label>--}}
{{--            </div>--}}
        <div class="radio">
            <label>
                <input type="radio" name="{{ $award }}" id="{{ $tid }}" value='{{ $tid }}'>
                Option one is this and that&mdash;be sure to include why it's great
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="{{ $award }}" id="{{ $tid }}" value='{{ $tid }}'>
                Option two can be something else and selecting it will deselect option one
            </label>
        </div>
    </div>

@stop
