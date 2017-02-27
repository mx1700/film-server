@extends('layouts.admin')

@section('main')

@if (Session::has('message'))
<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        @if(isset($card->id))
            编辑地点卡
        @else
            添加地点卡
        @endif
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST"
              action="{{ $card->id ? route('locationCards.update', ['id'=> $card->id, 'film' => $film->id]) : route('locationCards.store', ['film' => $film->id]) }}">
            {{ csrf_field() }}

            @if($card->id)
                {{ method_field('PUT') }}
            @endif

            <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
                <label for="start_time" class="col-md-2 control-label">开始时间</label>

                <div class="col-md-3">
                        <input id="start_time" type="text" class="form-control" placeholder="00:00:00"
                               name="start_time" value="{{ old('start_time', $card->start_time) }}" required>

                    @if ($errors->has('start_time'))
                        <span class="help-block">
                            <strong>{{ $errors->first('start_time') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('card') ? ' has-error' : '' }}">
                <label for="card" class="col-md-2 control-label">卡片物料地址</label>

                <div class="col-md-6">
                    <input id="card" type="text" class="form-control"
                           name="card" value="{{ old('card', $card->card) }}" required>

                    @if ($errors->has('card'))
                        <span class="help-block">
                            <strong>{{ $errors->first('card') }}</strong>
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
