<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'home'])->name('home');
//'class' возвращает в виде строки полный путь к классу

Route::get('contacts', [MainController::class, 'contacts'])->name('contacts');
//здесь задаем имя маршруту. потот к нему можно обращаться через функцию route('route_name')
//использовать имена полезно в том случае, если нужно будет менять url-адреса. Они меняются только в этом файле а по коду уже ничего трогать не нужно.
// так "Route::get('contacts'...." можно переименовать на 'kontakty' и все продолжить работать

Route::post('contacts', [MainController::class, 'getContacts'])->name('getContacts');
Route::get('signup', [MainController::class, 'signup']);
Route::post('signup', [MainController::class, 'getSignup']);

Auth::routes();

Route::get('article/{article:slug}', [MainController::class, 'article'])->name('article');




Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('categories', CategoryController::class); //создаем ресурсные маршруты. Параметры: url-адрес; контроллер отвечающий за этот ресурс
    // ресурсные маршруты работают только для предустановленных методов контроллера. Если добавляем свой метод - пишем отдельный путь
    // через ->middleware(['auth', 'admin']) ограничиваем вход только для зарегистрированных пользователей и проверяем является ли пользователь админом
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('reviews', ReviewController::class);
    Route::resource('articles', ArticleController::class);
});
