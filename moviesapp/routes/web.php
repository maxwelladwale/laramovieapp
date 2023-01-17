<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/', [MoviesController::class, 'index']);
Route::get('/movies/{id}', [MoviesController::class, 'show']);
Route::get('/movies', [MoviesController::class, 'index']);
Route::get(
    '/',
    [MoviesController::class, 'index']
)->name('movies');

// Route::get('/', 'MoviesController@index')->name('movies.index');
// Route::get('/', 'UserController@index')->name('user');
// Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');

// Route::view('/', 'index');
// Route::view('/movies', 'show');