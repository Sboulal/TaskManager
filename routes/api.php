<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'apiIndex']);
Route::post('/tasks', [TaskController::class, 'apiStore']); 
Route::get('/tasks/{id}', [TaskController::class, 'apiShow']);
Route::put('/tasks/{id}', [TaskController::class, 'apiUpdate']);
Route::delete('/tasks/{id}', [TaskController::class, 'apiDestroy']);