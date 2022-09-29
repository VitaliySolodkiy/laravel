@extends('templates.main')

@section('content')
    <div class="container">
        <h2>Importatnt Articles</h2>
        @foreach ($articles as $article)
            <article>
                <h2>{{ $article->name }}</h2>
                <img src="{{ $article->image }}" alt="" style="width:100px">
                <div>{{ $article->short_content }}</div>
                <a href="/article/{{ $article->slug }}">Read more...</a>
            </article>
            <hr>
        @endforeach
    </div>
@endsection
