@extends ('templates.admin')

@section('content')
    <h1>Edit Comment</h1>
    {!! Form::model($review, ['route' => ['reviews.update', $review->id], 'method' => 'PUT']) !!}
    {{-- у модели есть свойство name, значить в поле с названием name подставляется его значение --}}
    @include('admin.reviews._form')
    {!! Form::submit('Save', ['class' => 'btn btn-success mt-3']) !!}
    {!! Form::close() !!}
@endsection
