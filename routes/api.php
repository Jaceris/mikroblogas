<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('posts', \App\Http\Controllers\Api\PostController::class);
Route::apiResource('comments', \App\Http\Controllers\Api\CommentController::class);

Route::get('public/posts', [\App\Http\Controllers\API\public\PostController::class, 'index']);
Route::get('public/posts-by-user/{user_id}', [\App\Http\Controllers\API\public\PostController::class, 'getByUserId']);
Route::get('public/post-with-comments/{post}', [\App\Http\Controllers\API\public\PostController::class, 'getSingleWithComments']);