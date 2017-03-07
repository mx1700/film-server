@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">概览 <span class="sr-only">(current)</span></a></li>
                </ul>
                <h5>配置项</h5>
                <ul class="nav nav-sidebar">
                    <li><a href="{{ route('films.index') }}">影片管理</a></li>
                    {{--<li><a href="#">启动屏</a></li>--}}
                    <li><a href="{{ route('conf.help') }}">帮助</a></li>
                    {{--<li><a href="#">关于</a></li>--}}
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="">意见反馈</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @yield('main')
            </div>
        </div>
    </div>
@endsection
