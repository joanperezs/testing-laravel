<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CommunityController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
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

Route::apiResource("communities",CommunityController::class)
->except(['store','update','destroy']);


Route::apiResource("posts",PostController::class)
    ->except(['store','update','destroy']);

Route::apiResource("comments",CommentController::class)
    ->except(['store','update','destroy']);

Route::post("nuevoToken",[UserController::class,'nuevoToken']);
Route::post("register",[UserController::class,'register']);
//Protegidas
Route::apiResource("communities",CommunityController::class)
    ->only(['store','update','destroy'])
    ->middleware('auth:sanctum');


Route::apiResource("posts",PostController::class)
    ->only(['store','update','destroy'])
    ->middleware('auth:sanctum');


Route::apiResource("comments",CommentController::class)
    ->only(['store','update','destroy'])
    ->middleware('auth:sanctum');
    
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
