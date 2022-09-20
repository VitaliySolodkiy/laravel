@extends ('templates.main')

@section('content')
    <h1>Articles</h1>

    <a href="{{ route('articles.create') }}" class="btn btn-success">Create</a>

    @if (session('success'))
        <div class="text-success my-3">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Content</th>
                <th>Important</th>
                <th>Category</th>
                <th>Created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $article->image }}</td>
                    <td>{{ $article->name }}</td>
                    <td>{{ $article->content }}</td>
                    <td>{{ $article->important }}</td>
                    <td>{{ $article->category_id }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>
                        <a href="{{ route('articles.edit', ['article' => $article->id]) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
