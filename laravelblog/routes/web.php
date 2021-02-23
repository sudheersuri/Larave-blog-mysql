<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
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

Route::get('/home', [BlogController::class, 'hot'])->name('home');
Route::get('/hot', [BlogController::class, 'hot'])->name('hot');
Route::get('/food', [BlogController::class, 'food'])->name('food');
Route::get('/outdoor', [BlogController::class, 'outdoor'])->name('outdoor');
Route::get('/admin', [BlogController::class, 'admin'])->name('admin');
Route::get('/id/{id}', [BlogController::class, 'single'])->name('single');
Route::get('/search', [BlogController::class, 'search'])->name('search');
Route::post('/upload', [BlogController::class, 'upload'])->name('upload');