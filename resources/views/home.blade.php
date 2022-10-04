@extends('templates.main')

@section('content')
    <div class="container">
        <h2>Importatnt Articles</h2>
        @foreach ($articles as $article)
            <article>
                <h6 class="d-inline-block mb-2 text-success"><strong>{{ $article->category->name }}</strong></h6>
                <h2>{{ $article->name }}</h2>
                <a href="/article/{{ $article->slug }}"><img src="{{ $article->image }}" alt="" class="img-fluid"></a>
                <div class="my-3 text-break">{{ $article->short_content }}</div>
                <a href="/article/{{ $article->slug }}" class="btn btn-secondary btn-sm">Read more...</a>
            </article>
            <hr>
        @endforeach
    </div>
@endsection
