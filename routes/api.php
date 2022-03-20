<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks/{id}', [TaskController::class, 'getOne']);
Route::get('/tasks', [TaskController::class, 'getAll']);
Route::post('/tasks', [TaskController::class, 'create']);
Route::delete('/tasks/{id}', [TaskController::class, 'remove']);
Route::patch('/tasks/{id}', [TaskController::class, 'update']);
