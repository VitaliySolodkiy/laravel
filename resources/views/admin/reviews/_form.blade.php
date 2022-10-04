{{-- файлы с нижним подчеркиванием куда-то подключаются --}}
<div class="form-group">
    {!! Form::label('name', 'Author Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name')
        <div class="invalid-feedback text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, [
        'class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''),
    ]) !!}
    @error('content')
        <div class="invalid-feedback text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mt-3">
    {!! Form::label('article_id', 'Article') !!}
    {!! Form::select('article_id', $articles, null, ['class' => 'form-control']) !!}
</div>
