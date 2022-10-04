@extends ('templates.admin')

@section('content')
    <h1>Reviews</h1>

    <a href="/admin/reviews/create" class="btn btn-success">Create</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Content</th>
                <th>Article title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->no_tags_content }}</td>
                    <td><a href="/article/{{ $review->article->slug }}">{{ $review->article->name }}</a></td>
                    <td>
                        <div class="row flex-nowrap gx-1">
                            <div class="col d-flex justify-content-end">
                                <a href="{{ route('reviews.edit', ['review' => $review->id]) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                            </div>
                            <div class="col">

                                <form action="{{ route('reviews.destroy', ['review' => $review->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
