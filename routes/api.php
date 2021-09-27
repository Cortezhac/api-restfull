<?php

use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Authentication\RegisterUserController;
use App\Http\Controllers\CategoryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::post('/categories/create', [CategoryController::class, 'store']);
Route::put('/categories/update/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/delete/{id}', [CategoryController::class, 'delete']);

Route::post('/auth/register', [RegisterUserController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);