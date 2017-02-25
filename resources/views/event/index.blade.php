@extends('layouts.admin')

@section('main')
    <h1 class="page-header">事件管理</h1>
    <div class="row">
        <a href="{{ route('events.create', ['film' => $film->id]) }}" class="btn btn-default">添加新事件</a>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <td>开始时间</td>
                <td>结束时间</td>
                <td>类型</td>
                <td>物料地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{$event->start_time}}</td>
                <td>{{$event->end_time}}</td>
                <td>{{ $event->type_name }}</td>
                <td>
                    <a href="{{$event->resources_url}}">{{$event->resources}}</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('events.destroy', ['film' => $film->id, 'id' => $event->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('events.edit', ['film' => $film->id, 'id' => $event->id]) }}" class="btn btn-default">编辑</a>
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('确定删除事件？')">删除</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
