@extends ('templates.main')

@section('content')
    <h1>Categories</h1>

    <a href="/admin/categories/create" class="btn btn-success">Create</a>

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
                    <td>{{ $category->name }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
