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
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
