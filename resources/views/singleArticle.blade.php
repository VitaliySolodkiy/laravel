@extends('templates.main')

@section('content')
    <article>

        <h2>{{ $article->name }}</h2>
        <h6 class="d-inline-block mb-2 text-success"><strong>Categoty: {{ $article->category->name }}</strong> | Created at:
            {{ $article->created_at }}</h6>
        <a href="/article/{{ $article->slug }}"><img src="{{ $article->image }}" alt="" class="img-fluid"></a>
        <div class="my-3 text-break">{!! html_entity_decode($article->content) !!}</div>
    </article>
    @guest
        <h5 class="my-3"><a href="{{ route('login') }}">{{ __('Login') }}</a> or <a
                href="{{ route('register') }}">{{ __('Register') }}</a>
            to leave comments</h5>
    @else
        <h3 class="my-3">Create review:</h3>

        {!! Form::open(['url' => '/admin/reviews']) !!}
        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, [
                'class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''),
            ]) !!}
            @error('content')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>

        {!! Form::hidden('name', Auth::user()->name) !!}
        {!! Form::hidden('article_id', $article->id) !!}

        {!! Form::submit('Save', ['class' => 'btn btn-success mt-3']) !!}
        {!! Form::close() !!}
    @endguest
    <h3 class="my-3">Comments:</h3>

    @if (count($reviews) === 0)
        <p>There are no comments yet. You will be first.</p>
    @endif

    @foreach ($reviews as $review)
        <p>{{ $review->no_tags_content }} - <span class="text-primary">{{ $review->name }}</span>,
            <span class="text-secondary fst-italic">{{ $review->created_at }}</span>
        </p>
        <hr>
    @endforeach
@endsection
