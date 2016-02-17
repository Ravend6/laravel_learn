@extends('layouts.main')

@section('title', 'Edit ' . $user->name)

@section('content')
  <h1>{{ 'Edit ' . $user->name }}</h1>
  {!! Form::model($user, [
    'method' => 'PATCH',
    'action' => ['UsersController@update', $user->id],
    'files' => true
  ]) !!}
    @include('users._form', ['submitButton' => 'Update Avatar'])
  {!! Form::close() !!}
@stop