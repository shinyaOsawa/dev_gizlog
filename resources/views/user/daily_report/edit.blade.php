@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['report.update',  $report->id], 'method' => 'PUT']) !!}
      <!-- <input class="form-control" name="user_id" type="hidden" value="{{ $report->user_id }}"> -->
      <div class="form-group form-size-small">
        <!-- <input class="form-control" name="reporting_time" type="date" value="{{ $report->reporting_time->format('Y-m-d') }}"> -->
        {!! Form::input('date', 'reporting_time', $report->reporting_time->format('Y-m-d'), ['class' => 'form-control']) !!}
        <span class="help-block"></span>
      </div>
      <div class="form-group @if($errors->has('title')) has-error @endif">
        <!-- <input class="form-control" placeholder="Title" name="title" type="text" value="{{ $report->title }}"> -->
        {!! Form::input('text', 'title', $report->title, ['class' => 'form-control']) !!}
      <span class="help-block">
        {{ $errors->first('title') }}
      </span>
      </div>
      <div class="form-group @if($errors->has('contents')) has-error @endif">
        <!-- <textarea class="form-control" placeholder="本文" name="contents" cols="50" rows="10">{{ $report->contents }}</textarea> -->
        {!! Form::textarea('contents', $report->contents, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
      <span class="help-block">
        {{ $errors->first('contents') }}
      </span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    {!! Form::close() !!}
  </div>
</div>

@endsection
