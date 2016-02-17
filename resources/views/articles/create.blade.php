@extends('layouts.main')

@section('title', 'Article Create')

@section('content')

  <h1>New Article</h1>

  {{-- @include('errors.validation') --}}

  {!! Form::open(['url' => 'articles']) !!}
    @include('articles._form', ['submitButton' => 'Add Article'])
  {!! Form::close() !!}

@stop

@section('scripts')
  <script>
    (function () {
      'use strict';

      $("input[name='title']").on('keyup', function (e) {
        e.preventDefault();

        $.ajax({
          url: '/api/v1/articles/generate-slug',
          method: 'post',
          data: {
            // _method: 'delete',
            'title': $(this).val(),
            _token: $(this).data('csrf')
          },
        }).done(function (data, status, req) {
          $("input[name='slug']").val(data);
        }).fail(function (err) {
          console.log(err);
        });
      });

      var simplemde = new SimpleMDE();

      $('#tag_list').select2({
        placeholder: 'Выберите теги'
      });
    }());
  </script>
@stop