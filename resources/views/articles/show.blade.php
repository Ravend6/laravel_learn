@extends('layouts/main')

@section('title', $article->title)

@section('content')
	<article>
    <h1>{{ $article->title }}</h1>
    <p>{!! $article->bodyToHtml() !!}</p>
  </article>
  <h5>Tags:</h5>
  @unless ($article->tags->isEmpty())
    <ul>
      @foreach ($article->tags as $tag)
        <li>{!! link_to_action('TagsController@show', $tag->name, [$tag->name]) !!}</li>
      @endforeach
    </ul>
  @endunless

  <a class="btn btn-info"
    href="{{ action('ArticlesController@edit', [$article->id]) }}">Edit</a>

  <br><br>
  @can('update', $article)
  	{!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
  		<button type="submit" class="btn btn-danger" onclick="return confirm('Вы действительно хотите удалить?');">Delete</button>
  	{!! Form::close() !!}
  @endcan
	{{-- {!! link_to_route('articles.destroy', 'D', $article->id, ['data-method'=>'delete']) !!} --}}
  {!! delete_to_route('articles.destroy', $article->id) !!}
@stop

@section('scripts')
  <script>
    (function () {
      'use strict';


    }());
  </script>
@stop