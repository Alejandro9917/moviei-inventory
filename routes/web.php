<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;

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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para el controlador de categorias
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category');
    Route::post('/category', [CategoryController::class, 'store'])->name('category_new');
});

//Rutas para el controlador de películas
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/movie/create', [MovieController::class, 'create'])->name('movie');
    Route::post('/movie', [MovieController::class, 'store'])->name('movie_new');
    Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->name('movie.edit');
    Route::get('/movie/{id}', [MovieController::class, 'update'])->name('movie.update');
});