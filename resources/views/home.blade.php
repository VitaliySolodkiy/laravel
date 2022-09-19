@extends('templates.main') {{-- пути строим от папки views. вместо слэша используется точка --}}

@section('title')
    {{ $title }}
@endsection

@section('content')
    @foreach ($categories as $category)
        {{ $category->name }} <br>
    @endforeach
@endsection
