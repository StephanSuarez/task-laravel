<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\controllers\api\TaskController;

Route::get('/tasks', [TaskController::class, 'getTasks']);
Route::post('/tasks', [TaskController::class, 'store']);

Route::post('/tasks/where', [TaskController::class], 'getWhere');
Route::put('/tasks/{id}', [TaskController::class], 'updateOne');
Route::patch('/tasks/{id}', [TaskController::class], 'updateParcial');
Route::delete('/tasks/{id}', [TaskController::class], 'destroy');
