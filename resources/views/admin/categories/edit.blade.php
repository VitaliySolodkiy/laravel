@extends ('templates.admin')

@section('content')
    <h1>Edit Category</h1>
    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
    {{-- у модели есть свойство name, значить в поле с названием name подставляется его значение --}}
    @include('admin.categories._form')
    {!! Form::submit('Save', ['class' => 'btn btn-success mt-3']) !!}
    {!! Form::close() !!}
@endsection
