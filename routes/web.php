<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;


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

Route::get('/', [IndexController::class, 'home'] )->name('homepage');
Route::get('/tim-kiem', [IndexController::class, 'search'] )->name('search');
Route::get('/search-ajax', [IndexController::class, 'ajaxSearch'] )->name('ajaxSearch');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country' ])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{id}', [IndexController::class, 'watch'])->name('watch');
Route::get('/episode', [IndexController::class, 'episode'])->name('episode');
Route::get('/view/{id}', [IndexController::class, 'view'])->name('view');


//ROUTE ADMIN
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('country',  App\Http\Controllers\CountryController::class);
Route::resource('episode',  App\Http\Controllers\EpisodeController::class);
Route::resource('genre',    App\Http\Controllers\GenreController::class);
Route::resource('movie',    App\Http\Controllers\MovieController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
