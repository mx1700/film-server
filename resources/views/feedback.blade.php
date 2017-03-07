@extends('layouts.admin')

@section('main')

@if (Session::has('message'))
<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        意见返回
    </div>
    <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>内容</td>
                    <td>平台</td>
                    <td>时间</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($feedback as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->content }}</td>
                        <td>{{ $item->platform == 1 ? 'android' : 'iOS' }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        {{ $feedback->links() }}
    </div>
</div>
@endsection

@section('js')

@endsection
