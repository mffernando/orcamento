@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('content-view')

  @if(session('success'))
    <h3>{{ session('success')['message'] }}</h3>
  @endif

<!--form-->
  {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'standard-form']) !!}
    @include('user.form-fields')
    @include('templates.form.submit', ['input' => 'submit'])
  {!! Form::close() !!}

<!--show-->
@include('user.list', ['user_list' => $users])

@endsection
