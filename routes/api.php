<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\BookController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->group(function () {
//     Route::get('books', [BookController::class, 'index']);
//     Route::post('books', [BookController::class, 'create']);
//     Route::put('books/{id}', [BookController::class, 'update']);
//     Route::delete('books/{id}', [BookController::class, 'delete']);
// });

// Route::controller(BookController::class)->group(function () {
//     Route::get('/books', 'index')->name('api.books.index');
//     Route::post('/books', 'create')->name('api.books.create'); // Create a new book
//     Route::put('/books/{id}', 'update')->name('api.books.update'); // Update an existing book
//     Route::delete('/books/{id}', 'delete')->name('api.books.delete'); // Delete a book
//     Route::patch('/books/{id}/status/{status}', 'status')->name('api.books.status'); // Change book status
// });

Route::prefix('books')->group(function() {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::post('/create', [BookController::class, 'create'])->name('books.add');
});
