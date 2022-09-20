{{-- файлы с нижним подчеркиванием куда-то подключаются --}}
<div class="form-group">
    {!! Form::label('name', 'Article Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name')
        <div class="invalid-feedback text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, [
        'class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''),
    ]) !!}
    @error('content')
        <div class="invalid-feedback text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    {!! Form::checkbox('important', '1') !!}
    {!! Form::label('important', 'important?') !!}
</div>

<div class="form-group mt-3">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'custom-select']) !!}
</div>
