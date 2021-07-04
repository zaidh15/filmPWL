<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\SutradaraController;
use App\Http\Controllers\FilmController;

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
    return view('layouts.home');
});

Route::get('/home', function () {
    return view('layouts.home');
});

Route::get('/about', function () {
    return view('layouts.about');
});

// Route::resource('/film', FilmController::class);
// Route::resource('/genre', GenreController::class);
Route::resource('/produksi', ProduksiController::class)->middleware('auth');
Route::resource('/sutradara', SutradaraController::class)->middleware('auth');
Route::resource('/film',FilmController::class)->middleware('auth');
Route::get('generate-pdf', [FilmController::class, 'generatePDF'])->middleware('auth');
Route::get('filmpdf', [FilmController::class, 'filmPDF'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/afterRegister', function () {
    return view('layouts.afterRegister');
});

Route::get('/users', function () {
    return view('layouts.users');
});