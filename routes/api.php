<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\controllers\api\TaskController;

Route::get('/tasks', [TaskController::class, 'getTasks']);
Route::post('/tasks', [TaskController::class, 'store']);