<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'apiIndex']);
Route::post('/tasks', [\App\Http\Controllers\TaskController::class, 'apiStore']);
Route::get('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'apiShow']);
Route::put('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'apiUpdate']);
Route::delete('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'apiDestroy']);
Route::post('/register', [\App\Http\Controllers\UserController::class, 'store']);