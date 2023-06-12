<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('admin')->group(function () {
    Route::get('/createCategory', [CategoryController::class, 'create']);
    Route::post('/storeCategory', [CategoryController::class, 'store']);
    Route::get('/createBook', [BookController::class, 'create']);
    Route::post('/storeBook', [BookController::class, 'store']);
    Route::delete('/deleteBook/{id}', [BookController::class, 'delete']);
    Route::get('/editBook/{id}', [BookController::class, 'editBook']);
    Route::patch('/patchBook/{id}', [BookController::class, 'update']);
});

Route::get('/', [BookController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
