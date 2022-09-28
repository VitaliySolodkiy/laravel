@extends ('templates.main')

@section('content')
    <h1>Edit Article</h1>
    {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT']) !!}
    {{-- у модели есть свойство name, значить в поле с названием name подставляется его значение --}}
    @include('admin.articles._form')
    {!! Form::submit('Save', ['class' => 'btn btn-success mt-3']) !!}
    {!! Form::close() !!}
@endsection
