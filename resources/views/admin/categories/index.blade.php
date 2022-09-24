@extends ('templates.main')

@section('content')
    <h1>Categories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-success">Create</a>

    @if (session('success'))
        <div class="text-success my-3">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }} <span
                            class="badge rounded-pill text-bg-primary">{{ $category->articles_count }}</span></td>
                    <td>
                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
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
