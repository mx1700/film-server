@extends('layouts.admin')

@section('main')

@if (Session::has('message'))
<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">
        帮助设置
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST"
              action="{{ route('conf.help') }}">
            {{ csrf_field() }}

            @for($i = 0; $i < count($helps); $i++)

                <div class="form-group{{ $errors->has("help_image[$i]") ? ' has-error' : '' }}">
                    <label for="{{"help_image[$i]"}}" class="col-md-2 control-label">图片地址{{$i+1}}</label>
                    <div class="col-md-6">
                        <input id="{{"help_image[$i]"}}" type="text" class="form-control"
                               name="{{"help_image[$i]"}}" value="{{ old("help_image[$i]", $helps[$i]['image_url']) }}" required>

                        @if ($errors->has("help_image[$i]"))
                            <span class="help-block">
                            <strong>{{ $errors->first("help_image[$i]") }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has("help_content[$i]") ? ' has-error' : '' }}">
                    <label for="{{"help_content[$i]"}}" class="col-md-2 control-label">内容{{$i+1}}</label>
                    <div class="col-md-6">
                        <input id="{{"help_content[$i]"}}" type="text" class="form-control"
                               name="{{"help_content[$i]"}}" value="{{ old("help_content[$i]", $helps[$i]['content']) }}" required>
                        @if ($errors->has("help_content[$i]"))
                            <span class="help-block">
                            <strong>{{ $errors->first("help_content[$i]") }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            @endfor


            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')

@endsection
