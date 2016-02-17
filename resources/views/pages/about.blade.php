@extends('layouts/main')
@section('title', 'About')
@section('content')
  <h1>About {!! $page !!}</h1>
  <ul>
    @forelse ($users as $user)
      <li>{{ $user }}</li>
    @empty
      <li>No users</li>
    @endforelse
  </ul>
@stop
