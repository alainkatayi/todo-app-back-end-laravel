<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogOutController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class , 'login'])->name('login'); //connexiond'un user http://127.0.0.1:8000/api/login
Route::post('/register', [RegisterController::class , 'register']); // enregistrement d'un user http://127.0.0.1:8000/api/register
Route::middleware("auth:sanctum")->post('/logout', [LogOutController::class, 'log_out']); // deconnexion du user http://127.0.0.1:8000/api/logout
Route::middleware("auth:sanctum")->get('/list_user', [UserController::class, 'list']); //recuperer touts les users http://127.0.0.1:8000/api/list_user


Route::middleware("auth:sanctum")->post('/add_task', [TaskController::class, 'add_task']); //creer une task http://127.0.0.1:8000/api/add_task
Route::middleware("auth:sanctum")->get('/list_task', [TaskController::class, 'list_task']); //recuper toutes les task http://127.0.0.1:8000/api/list_task
Route::middleware("auth:sanctum")->put('/tasks/{id}', [TaskController::class, 'update']);//mise a jour d'une task http://127.0.0.1:8000/api/tasks/1
Route::middleware("auth:sanctum")->delete('/tasks/{id}', [TaskController::class, 'delete']);//suppression  d'une task http://127.0.0.1:8000/api/tasks/1

