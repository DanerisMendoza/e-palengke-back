<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\RequirementDetailController;
use App\Http\Controllers\StoreTypeDetailController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserRoleDetailController;
use App\Http\Controllers\ApplicantCredentialController;
use App\Http\Controllers\ProductTypeDetailController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;

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
Route::get('/GET_REQUIREMENT_DETAIL_BY_USER_ROLE_DETAILS_ID/{id}', [RequirementDetailController::class, 'GET_REQUIREMENT_DETAIL_BY_USER_ROLE_DETAILS_ID']);

Route::middleware('auth:api')->group(function () {
    //USER API
    Route::resource('User', UserController::class);
    Route::get('/Logout', [UserController::class, 'Logout']);
    Route::get('/GetUserDetails', [UserController::class, 'GetUserDetails']);
    Route::get('/GetSideNav', [UserController::class, 'GetSideNav']);
    Route::get('/GetAllSideNav', [UserController::class, 'GetAllSideNav']);
    Route::get('/authenticate', [UserController::class, 'authenticate']);
    Route::post('/UpdateUserBalance', [UserController::class, 'UpdateUserBalance']);
    //REQUIREMENT API
    Route::resource('requirements', RequirementController::class);
    Route::resource('RequirementDetail', RequirementDetailController::class);
    // Edit a Requirement Detail
    Route::put('/RequirementDetail/{id}', [RequirementDetailController::class, 'edit']);    
    Route::put('/RequirementDetail/{id}', [RequirementDetailController::class, 'store']);
    //STORE API
    Route::resource('StoreTypeDetail', StoreTypeDetailController::class);
    Route::get('/GetActiveStore', [StoreController::class, 'GetActiveStore']);
    //PRODUCT API 
    Route::resource('ProductTypeDetail', ProductTypeDetailController::class);
    Route::resource('Product', ProductController::class);
    //USER ROLE API
    Route::resource('UserRole', UserRoleController::class);
    Route::resource('updateUserRole', UserRoleController::class);
    Route::get('/Get_UserRole_With_Accessess_And_Requirements', [UserRoleController::class, 'Get_UserRole_With_Accessess_And_Requirements']);
    Route::post('/SubmitApplicantCrendential', [UserRoleController::class, 'SubmitApplicantCrendential']);
    Route::get('/GetApplicants', [UserRoleController::class, 'GetApplicants']);
    Route::patch('/ApproveUserRole/{id}', [UserRoleController::class, 'ApproveUserRole']);
    Route::patch('/DissaproveUserRole/{id}', [UserRoleController::class, 'DissaproveUserRole']);
    //USER ROLE DETAIL API
    Route::resource('UserRoleDetail', UserRoleDetailController::class);
    //APPLICANT CREDENTIAL API
    Route::resource('ApplicantCrendential', ApplicantCredentialController::class);
});