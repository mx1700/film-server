@extends('layouts.admin')

@section('main')
    <h1 class="page-header">影片管理</h1>
    <div class="row">
        <a href="{{ route('films.create') }}" class="btn btn-default">添加新影片</a>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <td>ID</td>
                <td>名称</td>
                <td>封面</td>
                <td>影片时长</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($films as $film)
            <tr>
                <td>{{ $film->id }}</td>
                <td>{{ $film->name }}</td>
                <td><img src="{{ $film->cover_url }}" style="height: 100px" /></td>
                <td>{{ $film->runtime }} 分钟</td>
                <td>
                    <a class="btn btn-default">
                        地点卡
                    </a>
                    <a href="{{ route('events.index', ['film' => $film->id]) }}" class="btn btn-default">事件</a>
                    <a href="{{ route('films.edit', [ 'id' => $film->id]) }}" class="btn btn-default">编辑</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
