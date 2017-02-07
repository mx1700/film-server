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
                <li><a href="#">首页列表</a></li>
                <li><a href="#">启动屏</a></li>
                <li><a href="#">帮助</a></li>
                <li><a href="#">关于</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">意见反馈</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">欢迎</h1>
            <div class="panel panel-default">
                <div class="panel-heading">控制台</div>

                <div class="panel-body">
                    你已经登录!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
