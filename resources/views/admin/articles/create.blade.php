@extends ('templates.admin')

@section('content')
    <h1>Create article</h1>

    {{-- {!! Form::open(['url' => '/admin/categories']) !!} --}}
    {{-- в ресурсном маршруте указано, что если на страницу  /admin/categories зайти через метод POST,
        то запускается метод store()
        это можно посмотреть через команду php artisan route:list --}}
    {!! Form::open(['route' => 'articles.store', 'files' => true]) !!}
    @include('admin.articles._form')
    {!! Form::submit('Save', ['class' => 'btn btn-success mt-3']) !!}
    {!! Form::close() !!}
@endsection
