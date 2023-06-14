<?php
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/books', [ApiController::class, 'index']);

Route::post('/loginapi', [ApiController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logoutapi', [ApiController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/createapi', [ApiController::class, 'create']);
Route::middleware('auth:sanctum')->post('/updateapi/{id}', [ApiController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/deleteapi/{id}', [ApiController::class, 'delete']);
