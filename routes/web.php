<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewController;


Route::get('', [viewController::class, 'home']);
Route::get('/dashboard', [viewController::class, 'dashboard']);
Route::get('/add', [viewController::class, 'add_task']);
Route::get('update', [viewController::class, 'update']);

Route::post('/user', [UserController::class, 'store']);
Route::get('/login', [viewController::class, 'login']);
Route::get('/register', [viewController::class, 'register']);

