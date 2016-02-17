<div class="form-group">
  {!! Form::label('title', 'Заглавие:', ['class' => 'control-label']) !!}
  {!! Form::text('title', null, ['class' => 'form-control', 'data-csrf' => csrf_token()]) !!}
  @if ($errors->has('title'))
    <span class="help-block">{{ $errors->first('title') }}</span>
  @endif
</div>
<div class="form-group">
  {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
  {!! Form::text('slug', null, ['class' => 'form-control',
    'placeholder' => 'Генерируется автоматически']) !!}
  @if ($errors->has('slug'))
    <span class="help-block">{{ $errors->first('slug') }}</span>
  @endif
</div>
<div class="form-group">
  {!! Form::label('body', 'Текст:', ['class' => 'control-label']) !!}
  {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
  @if ($errors->has('body'))
    <span class="help-block">{{ $errors->first('body') }}</span>
  @endif
</div>
<div class="form-group">
  {!! Form::label('published_at', 'Published:', ['class' => 'control-label']) !!}
  {!! Form::input('date', 'published_at',
    isset($article) ? $article->published_at->format('Y-m-d') : date('Y-m-d'),
    ['class' => 'form-control'])!!}
  @if ($errors->has('published_at'))
    <span class="help-block">{{ $errors->first('published_at') }}</span>
  @endif
</div>
<div class="form-group">
  {!! Form::label('tag_list', 'Теги:', ['class' => 'control-label']) !!}
  {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list',
    'class' => 'form-control', 'multiple']) !!}
  @if ($errors->has('tag_list'))
    <span class="help-block">{{ $errors->first('tag_list') }}</span>
  @endif
</div>
<div class="form-group">
  {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>
