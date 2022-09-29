@extends ('templates.main')

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
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->no_tags_content }}</td>
                    <td>{{ $review->article->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
