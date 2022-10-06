@extends ('templates.admin')

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
                <th>Comments count</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr data-id="{{ $article->id }}">
                    <td>{{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->iteration }}</td>
                    <td> <img src="{{ $article->image }}" style="width:70px" alt="">
                    </td>
                    <td>
                        <div class="article-name" data-edit="false">
                            <p>{{ $article->name }}</p>
                        </div>
                    </td>
                    <td>{{ $article->short_content }}</td> {{-- short_content - функция из Models/Article. В файле функция называется shortContent(), но здесь camel case первращаем в snake --}}
                    <td><i
                            class="icon important-js @if ($article->important) text-success @else text-danger @endif">{{ $article->important }}</i>
                    </td>
                    <td>{{ $article->category->name }}</td>
                    {{-- category->name получаем следующим образом:
                        - в Models/Article создается функция category()
                        - в ней указываем что article принадлежит категории.
                        - соответственно в объекте article появляется коллекция category откуда мы можем извлечь нужные нам данные
                        Документация - https://laravel.com/docs/9.x/eloquent-relationships
                        --}}
                    <td> <span class="badge rounded-pill text-bg-primary">{{ $article->reviews->count() }}</span> </td>
                    {{-- rewievs получаем следующим образом:
                        - в Models/Article создается функция reviews()
                        - в ней указываем что article имеет отзывы.
                        - соответственно в объекте article появляется коллекция reviews откуда мы можем извлечь нужные нам данные
                        - через функцию count() получаем количество комментарием относящихся к конкретной статье
                        --}}
                    <td>{{ $article->created_at }}</td>
                    <td>
                        <div class="row flex-nowrap gx-1">
                            <div class="col d-flex justify-content-end">
                                <a href="{{ route('articles.edit', ['article' => $article->id]) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                            </div>
                            <div class="col">

                                <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">delete</button>
                                </form>
                            </div>
                        </div>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $articles->links() }}
@endsection
