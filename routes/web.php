<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MemberController;
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

Route::resource('login', LoginController::class)->only([
    'index', 'store'
]);

Route::middleware(['token'])->group(function () {
    Route::resource('admin', AdminController::class)->only([
        'index'
    ]);

    Route::resource('categories', CategoriesController::class)->only([
        'index', 'store', 'edit', 'update', 'destroy'
    ]);
    
    //Books
    Route::get('books',[BooksController::class,'index'])->name('booksIndex');
    Route::get('books/{id}',[BooksController::class,'getById'])->name('books.getById');
    Route::get('books-add',[BooksController::class,'createBooks'])->name('books.add');
    Route::get('books_update/{id}',[BooksController::class,'updateBooks'])->name('books_update');
    Route::get('books-update/{id}',[BooksController::class,'update'])->name('books.update');
    Route::get('books-delete/{id}',[BooksController::class,'delete'])->name('books.delete');
    
    //Publishers
    Route::get('publishers',[PublishersController::class,'index'])->name('publishersIndex');
    Route::get('publishers-detail/{id}',[PublishersController::class,'getById'])->name('publishers.getById');
    Route::get('publishers-add',[PublishersController::class,'createPublishers'])->name('publishers.add');
    Route::get('publishers_update/{id}',[PublishersController::class,'updatepublishers'])->name('publishers_update');
    Route::get('publishers-update/{id}',[PublishersController::class,'update'])->name('publishers.update');
    Route::get('publishers-delete/{id}',[PublishersController::class,'delete'])->name('publishers.delete');
    // Route::get('category',[CategoryController::class,'store']);
    
    //Employees
    Route::get('employees',[EmployeesController::class,'index'])->name('employeesIndex');
    Route::get('employees/{id}',[EmployeesController::class,'getById'])->name('employees.getById');
    Route::get('employees-add',[EmployeesController::class,'createEmployees'])->name('employees.add');
    Route::get('employees_update/{id}',[EmployeesController::class,'updateEmployees'])->name('employees_update');
    Route::get('employees-update/{id}',[EmployeesController::class,'update'])->name('employees.update');
    Route::get('employees-delete/{id}',[EmployeesController::class,'delete'])->name('employees.delete');
    
    //Members
    Route::get('members',[MemberController::class,'index'])->name('membersIndex');
    Route::get('members/{id}',[MemberController::class,'getById'])->name('members.getById');
    Route::get('members-add',[MemberController::class,'createmembers'])->name('members.add');
    Route::get('members_update/{id}',[MemberController::class,'updatemembers'])->name('members_update');
    Route::get('members-update/{id}',[MemberController::class,'update'])->name('members.update');
    Route::get('members-delete/{id}',[MemberController::class,'delete'])->name('members.delete');
    
    //Borrows
    Route::get('borrows',[BorrowsController::class,'index'])->name('borrowsIndex');
    Route::get('borrows/{id}',[BorrowsController::class,'getById'])->name('borrows.getById');
    Route::get('borrows-add',[BorrowsController::class,'createborrows'])->name('borrows.add');
    Route::get('borrows_update/{id}',[BorrowsController::class,'updateborrows'])->name('borrows_update');
    Route::get('borrows-update/{id}',[BorrowsController::class,'update'])->name('borrows.update');
    Route::get('borrows-delete/{id}',[BorrowsController::class,'delete'])->name('borrows.delete');
});

