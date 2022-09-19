<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'home']); //'class' возвращает в виде строки полный путь к классу
Route::get('contacts', [MainController::class, 'contacts']);
Route::post('contacts', [MainController::class, 'getContacts']);
Route::get('signup', [MainController::class, 'signup']);
Route::post('signup', [MainController::class, 'getSignup']);


Route::resource('admin/categories', CategoryController::class); //создаем ресурсные маршруты. Параметры: url-адрес; контроллер отвечающий за этот ресурс
Route::resource('admin/reviews', ReviewController::class);
