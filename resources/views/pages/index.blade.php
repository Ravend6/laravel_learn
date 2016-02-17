@extends('layouts.main')

@section('title', 'Index')

@section('content')
  <h1>Index page</h1>
@stop

{{-- @section('scripts')
  <script>
  (function () {
    'use strict';

    $.ajax({
      url: '/articles',
      method: 'get'
    }).done(function (data, status, req) {
      console.log(data);
    }).fail(function (err) {
      console.log(err);
    });
  }());
  </script>
@stop --}}