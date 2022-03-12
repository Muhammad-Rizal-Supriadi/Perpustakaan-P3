<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\BorrowsController;
use App\Http\Controllers\CategoriesController;

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
Route::get('/', function(){
    return view('welcome');
});

Route::resource('login', AuthController::class)->only([
    'index', 'store'
]);
Route::post('logout', [AuthController::class, 'logout'])->name('logout.store');

Route::middleware(['token'])->group(function () {
    Route::resource('admin', AdminController::class)->only([
        'index'
    ]);

    Route::resource('categories', CategoriesController::class)->only([
        'index', 'store', 'edit', 'update', 'destroy'
    ]);

    Route::resource('books', BooksController::class)->only([
        'index', 'show', 'store', 'edit', 'update', 'destroy'
    ]);
    
    Route::resource('publishers', PublishersController::class)->only([
        'index', 'show', 'store', 'edit', 'update', 'destroy'
    ]);
    
    Route::resource('employees', EmployeesController::class)->only([
        'index', 'show', 'store', 'edit', 'update', 'destroy'
    ]);

    Route::resource('members', MembersController::class)->only([
        'index', 'show', 'store', 'edit', 'update', 'destroy'
    ]);

    Route::resource('borrows', BorrowsController::class)->only([
        'index', 'show', 'store', 'edit', 'update', 'destroy'
    ]);
});

