<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\RequirementDetailController;
use App\Http\Controllers\StoreTypeDetailController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\ApplicantCredentialController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [UserController::class, 'login']);

// Route::middleware('auth:api')->get('/GET_USER_INFO', function (Request $request) {
//     $user_info = $request->user();
//     return $user_info;
// });

Route::middleware('auth:api')->get('/logout', function (Request $request) {
    return $request->user()->token()->revoke();
});


Route::middleware('auth:api')->group(function () {

    //user api
    Route::resource('users', UserController::class);
    // Route::post('loginUser', [UserController::class, 'loginUser']);
    //requirement api
    Route::resource('requirements', RequirementController::class);
    Route::resource('RequirementDetail', RequirementDetailController::class);
    //store api
    Route::resource('StoreTypeDetail', StoreTypeDetailController::class);
    //user role api
    Route::resource('UserRole', UserRoleController::class);
    //applicant credential api
    Route::resource('ApplicantCrendential', ApplicantCredentialController::class);
    Route::post('/SubmitApplicantCrendential', [ApplicantCredentialController::class, 'SubmitApplicantCrendential']);

});