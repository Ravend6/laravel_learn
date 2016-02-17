@extends('layouts/main')

@section('title', 'Edit Article: '.$article->title)

@section('content')
  <h1>Edit Article: {{ $article->title }}</h1>

  {{-- @include('errors.validation') --}}

  {!! Form::model($article, [
    'method' => 'PATCH',
    'action' => ['ArticlesController@update', $article->id]
  ]) !!}
    @include('articles._form', ['submitButton' => 'Update Article'])
  {!! Form::close() !!}

@stop

@section('scripts')
  <script>
    (function () {
      'use strict';

      var simplemde = new SimpleMDE();

      $('#tag_list').select2({
        placeholder: 'Выберите теги'
      });
    }());
  </script>
@stop
