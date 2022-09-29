@extends ('templates.main')

@section('content')
    <h1>Create review</h1>

    {!! Form::open(['url' => '/admin/reviews']) !!}
    <div class="form-group">
        {!! Form::label('name', 'User Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Review:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group mt-3">
        {!! Form::label('article_id', 'Article') !!}
        {!! Form::select('article_id', $articles, null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Save', ['class' => 'btn btn-success mt-3']) !!}
    {!! Form::close() !!}
@endsection
