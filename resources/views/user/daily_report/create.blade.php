@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
{!! Form::open(['route' => ['report.store'], 'method' => 'POST']) !!}
      <input class="form-control" name="user_id" type="hidden">
      <div class="form-group form-size-small">
    <input class="form-control" name="reporting_time" type="date">
    <span class="help-block"></span>
    </div>
    <div class="form-group @if($errors->has('title')) has-error @endif">
      <input class="form-control" placeholder="Title" name="title" type="text">
      <span class="help-block">
        {{ $errors->first('title') }}
      </span>
    </div>
    <div class="form-group @if($errors->has('contents')) has-error @endif">
      <textarea class="form-control" placeholder="Content" name="contents" cols="50" rows="10"></textarea>
      <span class="help-block">
        {{ $errors->first('contents') }}
      </span>
    </div>
    <!-- <button type="submit" class="btn btn-success pull-right">Add</button> -->
    {!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}
{!! Form::close() !!}
  </div>
</div>

@endsection
