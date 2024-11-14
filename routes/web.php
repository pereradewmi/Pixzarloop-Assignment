<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
});

// Route::get('/dashboard', function () {
//     return view('backend.dashboard');
// })->name('dashboard');

Route::get('/login', function () {
    return view('frontend.login');
})->name('login');

// Route::get('/book', function () {
//     return view('backend.books.index');
// })->name('book');

// Route::get('/authors', function () {
//     return view('backend.authors.index');
// })->name('authors');

// Route::get('/categories', function () {
//     return view('backend.categories.index');
// })->name('categories');


//dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'all')->name('dashboard');
    });

// books - Backend
    Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index')->name('books');
    Route::get('/add-book', 'add')->name('book.add');
    Route::post('/create-book', 'create')->name('book.create');
    Route::get('/edit-book/{id}', 'edit')->name('book.edit');
    Route::post('/update-book', 'update')->name('book.update');
    Route::post('/delete-book/{id}', 'delete')->name('book.delete');
    Route::post('/change-book-status/{id}/{status}', 'status')->name('book.status');
});

 // authors - Backend
    Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index')->name('authors');
    Route::get('/add-author', 'add')->name('authors.add');
    Route::post('/create-author', 'create')->name('create-author');
    Route::get('/edit-author/{id}', 'edit')->name('edit-author');
    Route::post('/update-author', 'update')->name('update-author');
    Route::post('/delete-author/{id}', 'delete')->name('delete-author');
    Route::post('/change-author-status/{id}/{status}', 'status')->name('author.status');
});

 // categories - Backend
    Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories');
    Route::get('/add-category', 'add')->name('category.add');
    Route::post('/create-category', 'create')->name('category.create');
    Route::get('/edit-category/{id}', 'edit')->name('category.edit');
    Route::post('/update-category', 'update')->name('category.update');
    Route::post('/delete-category/{id}', 'delete')->name('category.delete');
    Route::post('/change-category-status/{id}/{status}', 'status')->name('category.status');
});
