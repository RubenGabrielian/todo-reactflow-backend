<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register']);
Route::post("/login",[AuthController::class,'login']);

Route::post("create-todo",[\App\Http\Controllers\Api\TodosController::class,'create']);
Route::get('todos',[\App\Http\Controllers\Api\TodosController::class,'todos']);
Route::put('update-todo',[\App\Http\Controllers\Api\TodosController::class,'update']);
Route::post("add-edge",[\App\Http\Controllers\EdgesController::class,'addEdge']);
Route::get("edges",[\App\Http\Controllers\EdgesController::class,'edges']);
Route::post('delete-todo',[\App\Http\Controllers\Api\TodosController::class,'deleteTodo']);
Route::put('update-todo-content',[\App\Http\Controllers\Api\TodosController::class,'updateTodoContent']);
