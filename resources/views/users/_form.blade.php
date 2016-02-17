<div class="form-group">
  {!! Form::label('avatar', 'Аватар:', ['class' => 'control-label']) !!}
  {!! Form::file('avatar', ['class' => 'form-control']) !!}
  @if ($errors->has('avatar'))
    <span class="help-block">{{ $errors->first('avatar') }}</span>
  @endif
</div>
<div class="form-group">
  {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>
