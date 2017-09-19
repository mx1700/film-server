@extends('layouts.admin')

@section('main')
    <h1 class="page-header">设置弹幕</h1>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif
        <form class="form-horizontal" role="form" method="POST"
              action="{{ route('barrages.store', ['event' => $event->id]) }}">
            {{ csrf_field() }}

            <table class="table table-hover">
                <thead>
                <tr>
                    <td style="width: 20px">#</td>
                    <td style="width: 100px">时间</td>
                    <td>内容</td>
                </tr>
                </thead>
                <tbody>
                @foreach($barrages as $barrage)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><input class="time" type="text" name="time[{{$loop->index}}]"
                                   value="{{ old("time[{$loop->index}]", $barrage['time'])}}" placeholder="00:00:00" /></td>
                        <td><input type="text" name="content[{{$loop->index}}]"
                                   value="{{ old("content[{$loop->index}]", $barrage['content']) }}" style="width: 440px" /></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        保存信息
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $('.time').toArray().forEach(function(field) {
            new Cleave(field, {
                delimiter: ':',
                blocks: [2, 2, 2],
                numericOnly: true
            });
        });
    </script>
@endsection
