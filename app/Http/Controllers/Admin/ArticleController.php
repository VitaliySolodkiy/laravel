<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')->orderBy('created_at', 'DESC')->paginate(3); //get() - по умолчанию возвращает всю выборку. Но вместо него можно исопльзовать paginate()

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*         $article = new Article();
        $article->name = $request->name;
        $article->content = $request->content;
        $article->important = $request->important;
        $article->category_id = $request->category_id;
        if ($request->image) {
            $path = $request->image->store('', ['disk' => 'public']); //сохранение загруженного файла в папку
            // настройки в config\filesystems.php, подмассив public
            // первым параметром метода store() можно указать подпапку, в той папке, которую мы указали в файле filesystems.php
            //в $path возвращается путь к файлу.
            $article->image = '/uploads/' . $path;
        }
        $article->save(); */

        $article = Article::create($request->all()); //в параметрах указываем массив данных. метод all() возвращает ассоциативный массив со всеми полями формы (кроме файлов)
        // перед использованием Article::create в Models/Article.php добавляем переменную $fillable, куда прописываем массив всех полей, который разрешаем массово заполнять
        //после использования Article::create в $article возвращается уже существующая статья с id

        if ($request->image) {
            $path = $request->image->store('articles', ['disk' => 'public']); //сохранение загруженного файла в папку
            // настройки в config\filesystems.php, подмассив public
            // первым параметром метода store() можно указать подпапку, в той папке, которую мы указали в файле filesystems.php
            //в $path возвращается путь к файлу.
            $article->image = '/uploads/' . $path;
            $article->save();
        }
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findorFail($id); //findorFail используется вместо find, если есть вероятность обращения к несуществующей странице
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        // $article->save();
        if ($request->image) {
            $path = $request->image->store('articles', ['disk' => 'public']); //сохранение загруженного файла в папку
            // настройки в config\filesystems.php, подмассив public
            // первым параметром метода store() можно указать подпапку, в той папке, которую мы указали в файле filesystems.php
            //в $path возвращается путь к файлу.
            $article->image = '/uploads/' . $path;

            $article->save();
        }
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
        return redirect()->route('articles.index');
    }
}
