<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RentalController;

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
//Rutas para el cliente
Route::get('/', function () {
    return redirect('/client/login');
});

Route::get('/client/login', [ClientController::class, 'viewLogin'])->name('client.view.login');
Route::post('/client/login', [ClientController::class, 'login'])->name('client.login');

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

//Rutas para el controlador de rentas
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/rental', [RentalController::class, 'index'])->name('rental.admin');
});

//Rutas para películas con cliente
Route::get('/client/movie', [MovieController::class, 'index'])->name('client.movie');

//Ruta para renta de película
Route::get('/client/rent/{movie_id}/{client_id}', [RentalController::class, 'rentMovie'])->name('rent.movie');