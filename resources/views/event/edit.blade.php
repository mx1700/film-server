@extends('layouts.admin')

@section('main')

@if (Session::has('message'))
<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        @if(isset($event->id))
            编辑事件
        @else
            添加新事件
        @endif
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST"
              action="{{ $event->id ? route('events.update', ['id'=> $event->id, 'film' => $film->id]) : route('events.store', ['film' => $film->id]) }}">
            {{ csrf_field() }}

            @if($event->id)
                {{ method_field('PUT') }}
            @endif

            <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
                <label for="start_time" class="col-md-2 control-label">开始时间</label>

                <div class="col-md-3">
                        <input id="start_time" type="text" class="form-control"
                               placeholder="00:00:00"
                               name="start_time" value="{{ old('start_time', $event->start_time) }}" required>

                    @if ($errors->has('start_time'))
                        <span class="help-block">
                            <strong>{{ $errors->first('start_time') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('end_time') ? ' has-error' : '' }}">
                <label for="end_time" class="col-md-2 control-label">结束时间</label>

                <div class="col-md-3">
                    <input id="end_time" type="text" class="form-control"
                           placeholder="00:00:00"
                           name="end_time" value="{{ old('end_time', $event->end_time) }}" required>

                    @if ($errors->has('end_time'))
                        <span class="help-block">
                            <strong>{{ $errors->first('end_time') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <label for="type" class="col-md-2 control-label">物料类型</label>

                <div class="col-md-2">
                    <select id="type" name="type" class="form-control">
                        @foreach(\App\Event::$type_names as $key => $name)
                            <option value="{{$key}}" {{$key == old('type', $event->type) ? 'selected' : ''}}>
                                {{$name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('resources') ? ' has-error' : '' }}">
                <label for="resources" class="col-md-2 control-label">物料地址</label>

                <div class="col-md-6">
                    <input id="resources" type="text" class="form-control"
                           name="resources" value="{{ old('resources', $event->resources) }}" required>

                    @if ($errors->has('resources'))
                        <span class="help-block">
                            <strong>{{ $errors->first('resources') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        保存信息
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        var cleave = new Cleave('#start_time', {
            delimiter: ':',
            blocks: [2, 2, 2],
            numericOnly: true
        });
        var cleave2 = new Cleave('#end_time', {
            delimiter: ':',
            blocks: [2, 2, 2],
            numericOnly: true
        });
    </script>
@endsection
