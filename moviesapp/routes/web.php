<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\MapsController;


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

Route::get('/', [MoviesController::class, 'index'])->name('index');
Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');
Route::get('/maps', [MapsController::class, 'maps'])->name('maps');
Route::get('/maps', [MapsController::class, 'maps'])->name('maps');

Route::group(['middleware'=>'guest'], function () {
//     Route::get('/login', 'login')->name('login');
Route::get('/login', \App\Http\Livewire\login::class)->name('login');
Route::get('/register', \App\Http\Livewire\register::class)->name('register');

//     Route::get('/register', 'register');
});
// Route::get('/login', 'login');
// Route::view('','livewire.home');