<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




//Route::prefix('users')->group(function () {
  //  Route::post('/add', [UserController::class, 'store']); // Créer un utilisateur
    //Route::get('/', [UserController::class, 'index']); // Récupérer tous les utilisateurs
//});

Route::post('/add', [UserController::class, 'store']);
Route::get('/store', [UserController::class, 'index']);


Route::post('/add_task', [TaskController::class, 'store']); //creer une tache
Route::get('/store_task', [TaskController::class, 'storex']);