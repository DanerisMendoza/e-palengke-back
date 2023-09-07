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

Route::post('/Login', [UserController::class, 'Login']);
Route::post('/Register', [UserController::class, 'Register']);

Route::middleware('auth:api')->group(function () {
    //user api
    Route::resource('User', UserController::class);
    Route::get('/Logout', [UserController::class, 'Logout']);
    Route::get('/GetUserDetails', [UserController::class, 'GetUserDetails']);
    Route::get('/GetSideNav', [UserController::class, 'GetSideNav']);
    Route::get('/GetAllSideNav', [UserController::class, 'GetAllSideNav']);
    Route::get('/authenticate', [UserController::class, 'authenticate']);
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