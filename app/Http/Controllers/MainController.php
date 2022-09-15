<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //объект данных формы

class MainController extends Controller
{
    public function home()
    {
        $title = 'Home Page';
        $subtitle = '<em>Subtitles</em>';
        $users = ['Bob', 'John', 'Bill'];
        return view('home', compact('title', 'subtitle', 'users')); //view - ищет файл из папки resorses/views/home.blade.php
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
        return $request->name;
    }

    public function signup()
    {

        return view('signup');
    }


    public function getSignup(Request $request) //указываем что прихожим объект класса Request (строгая типизация)
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
}
