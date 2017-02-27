@extends('layouts.admin')

@section('main')

@if (Session::has('message'))
<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        @if(isset($film->id))
            编辑影片
        @else
            添加新影片
        @endif
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST"
              action="{{ $film->id ? route('films.update', ['id'=> $film->id]) : route('films.store') }}">
            {{ csrf_field() }}

            @if($film->id)
                {{ method_field('PUT') }}
                <div class="form-group">
                <label class="col-md-2 control-label">ID</label>

                <div class="col-md-3">
                    <input type="text" class="form-control" value="{{$film->id}}" disabled>
                </div>
            </div>
            @endif

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">影片名称</label>

                <div class="col-md-3">
                    <input id="name" type="text" class="form-control"
                           name="name" value="{{ old('name', $film->name) }}" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                <label for="cover" class="col-md-2 control-label">封面</label>

                <div class="col-md-3">
                    <input id="cover" type="text" class="form-control"
                           name="cover" value="{{ old('cover', $film->cover) }}" required>

                    @if ($errors->has('cover'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cover') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('runtime') ? ' has-error' : '' }}">
                <label for="runtime" class="col-md-2 control-label">影片时长</label>

                <div class="col-md-2">
                    <input id="runtime" type="text" class="form-control" placeholder="00:00:00"
                           name="runtime" value="{{ old('runtime', $film->runtime) }}" required>

                    @if ($errors->has('runtime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('runtime') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                <label for="introduction" class="col-md-2 control-label">简介</label>

                <div class="col-md-8">
                    <textarea id="introduction" type="text" class="form-control" rows="8"
                              name="introduction" required>{{ old('introduction', $film->introduction) }}</textarea>

                    @if ($errors->has('introduction'))
                        <span class="help-block">
                            <strong>{{ $errors->first('introduction') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('tips') ? ' has-error' : '' }}">
                <label for="tips" class="col-md-2 control-label">提示信息</label>

                <div class="col-md-8">
                    <textarea id="tips" type="text" class="form-control" rows="4"
                              name="tips">{{ old('tips', $film->tips) }}</textarea>

                    @if ($errors->has('tips'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tips') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        保存信息
                    </button>
                    @if($film->id)
                        <button id="del_btn" type="button" class="btn btn-link btn-danger"
                                onclick="return del_click()"
                                style="margin-left: 50px">删除影片</button>
                    @endif
                </div>
            </div>
        </form>
        <form id="del_form" method="POST" name="del_form" action="{{route('films.destroy', ['id' => $film->id])}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    function del_click() {
        if (confirm('确定删除影片？')) {
            document.getElementById('del_form').submit();
        }
        return false;
    }
    new Cleave('#runtime', {
        delimiter: ':',
        blocks: [2, 2, 2],
        numericOnly: true
    });
</script>
@endsection