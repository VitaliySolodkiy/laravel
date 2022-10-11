<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Article;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request; //объект данных формы
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function home()
    {
        // $title = 'Home Page';

        // $categories = Category::all();
        // dd($categories);

        $articles = Article::with('category')->where('important', '=', 1)->whereNotNull('image')->latest()->get(); //если при сравнении используем '=', то его можно опустить

        return view('home', compact('articles')); //view - ищет файл из папки resorses/views/home.blade.php
    }
    public function contacts()
    {

        return view('contacts');
    }
    public function getContacts(Request $request) //указываем что прихожим объект класса Request (строгая типизация)
    {
        //dump($request->all());

        $request->validate([
            'name' => 'required|min:2|max:20',
            'email' => 'required|email',
            'message' => 'required|max:255',
        ]);
        Mail::to('majestis777@gmail.com')->send(new ContactForm($request->name, $request->email, $request->message));
        return redirect()->back()->with('success', 'Thank you! Mail was sent.');
    }

    public function signup()
    {

        return view('signup');
    }


    public function getSignup(Request $request) //указываем что приходит объект класса Request (строгая типизация)
    {
        //dump($request->all());

        $request->validate([
            'firstName' => 'required|min:2|max:20',
            'lastName' => 'min:2|max:20',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'age' => 'required|min:1|max:100|integer',
            'message' => 'max:255',
        ]);
        return dd($request->all());
    }

    public function article(Article $article) //за счет указания класса к которому принадлежит переменная, автоматически происходит выборка из БД по id и возвращается объект той или иной статьи
    // https://laravel.com/docs/9.x/routing#route-model-binding
    {
        // $article = Article::findOrFail($id);
        // в  resources\views\home.blade.php для получения пути к статье используем $article->slug
        // dd($article);
        $reviews = Review::all()->where('article_id', $article->id);
        return view('singleArticle', compact('article', 'reviews'));
    }
}
