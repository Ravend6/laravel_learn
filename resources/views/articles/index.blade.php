@extends('layouts/main')

@section('title', 'Articles')

@section('content')
<h1>Articles</h1>
<a href="{{ action('ArticlesController@create') }}">Create Article</a>
@foreach ($articles as $article)
  <article>
    <h2><a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a></h2>
    <p>Создано {{ $article->created_at->diffForHumans() }}</p>
    {{-- <p>{!! $article->bodyToHtml() !!}</p> --}}
    {{-- <p>{!! Helper::markdown($article->body)->render() !!}</p> --}}
    <p>{!! Helper::markdownRender($article->body, true) !!}</p>
    {{-- <div>{{ $a }}</div> --}}
  </article>
@endforeach
{!! $articles->render() !!}
@stop

