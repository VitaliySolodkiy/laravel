@extends ('templates.main')

@section('content')
    <h1>Create Category</h1>

    {!! Form::open(['url' => '/admin/categories']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Category Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Save', ['class' => 'btn btn-success mt-3']) !!}
    {!! Form::close() !!}
@endsection
