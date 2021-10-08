<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para el controlador de categorias
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category', [CategoryController::class, 'store'])->name('category_new');
});