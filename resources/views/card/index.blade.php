@extends('layouts.admin')

@section('main')
    <h1 class="page-header">地点卡管理</h1>
    <div class="row">
        <a href="{{ route('locationCards.create', ['film' => $film->id]) }}" class="btn btn-default">添加地点卡</a>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <td>开始时间</td>
                <td>卡片物料</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($cards as $item)
            <tr>
                <td>{{$item->start_time}}</td>
                <td>
                    <a href="{{$item->card_url}}">
                        <img src="{{$item->card_url}}" style="height: 100px">
                        {{ urldecode($item->card) }}
                    </a>
                </td>
                <td>
                    <form method="POST" action="{{ route('locationCards.destroy', ['film' => $film->id, 'id' => $item->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('locationCards.edit', ['film' => $film->id, 'id' => $item->id]) }}" class="btn btn-default">编辑</a>
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
