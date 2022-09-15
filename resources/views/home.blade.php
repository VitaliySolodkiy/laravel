@extends('templates.main') {{-- пути строим от папки views. вместо слэша используется точка --}}

@section('title')
    {{ $title }}
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <h2>{!! $subtitle !!}</h2>

    @if (count($users) > 0)
        <h3>Users</h3>
    @endif
    <p>Foreach:</p>

    @foreach ($users as $user)
        {{ $user }} <br>
    @endforeach

    <br>
    <p>Forelse:</p>

    @forelse ($users as $user)
        {{ $loop->iteration }}. {{ $user }} <br> {{-- loop - объект который автоматически создается в цикле --}}
    @empty
        <p>users no found</p> {{-- если пользователей нет --}}
    @endforelse
@endsection
