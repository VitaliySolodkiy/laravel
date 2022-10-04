@extends ('templates.admin')

@section('content')
    <h1>Create review</h1>

    {!! Form::open(['url' => '/admin/reviews']) !!}
    @include('admin.reviews._form')
    {!! Form::submit('Save', ['class' => 'btn btn-success mt-3']) !!}
    {!! Form::close() !!}
@endsection
