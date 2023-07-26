<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ReactionsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});


//Public Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register',[AuthController::class,'register']);

//Protected Routes

Route::group([
    'middleware'=> ['auth:sanctum']
],function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::resource('/tasks',TasksController::class);
    Route::resource('/posts',PostsController::class);
    Route::resource('/reactions',ReactionsController::class);
    Route::get('/user/{user}',[UsersController::class,'show']);
});