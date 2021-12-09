<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Http;

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

Route::get('/admin', function () {
    return view('Admin.first');
});

Route::get('login',[LoginController::class,'login']);
Route::post('loginApi',[LoginController::class,'loginApi'])->name('loginApi');
Route::get('verification',[LoginController::class,'verification']);

Route::get('category',[CategoryController::class,'index'])->name('categoryIndex');
Route::get('books',[BooksController::class,'index'])->name('booksIndex');

// Route::get('category',[CategoryController::class,'store']);
