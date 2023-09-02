<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/getAlluser', [UserController::class, 'index']);
// Route::resource('getAlluser', [UserController::class, 'index']);

Route::resource('createUser', UserController::class);
Route::resource('getAlluser', UserController::class);
Route::resource('getUserById', UserController::class);
Route::resource('updateUserById', UserController::class);
Route::post('loginUser', [UserController::class, 'loginUser']);