<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks/{id}', [TaskController::class, 'getOne']);
Route::get('/tasks/{id}', [TaskController::class, 'getOne']);

