{{-- файлы с нижним подчеркиванием куда-то подключаются --}}
<div class="form-group">
    {!! Form::label('name', 'Category Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name')
        <div class="invalid-feedback text-danger">{{ $message }}</div>
    @enderror
</div>
