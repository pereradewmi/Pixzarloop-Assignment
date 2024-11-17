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

Route::prefix('books')->group(function() {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::post('/create', [BookController::class, 'create'])->name('books.add');
    Route::put('/edit/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/delete/{id}', [BookController::class, 'delete']);
});


